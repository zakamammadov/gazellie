<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Hash;
class CategoryController extends Controller
{
    public function index()
    {
        if (request()->filled('search')||(request()->filled('top_id'))) {
            request()->flash();
            $search = request('search');
            $top_id = request('top_id');
            $list =Category::with('top_category')
            ->where('slug', 'like', "%$search%")
            ->where('top_cat_id',$top_id)
                ->orderByDesc('created_at')
                ->paginate(10)
                ->appends(['search'=>$search,
                            'top_id'=>$top_id
            ]);
        } else{
            $list=Category::with('top_category')->orderByDesc('created_at')->paginate(10);
        }
        $top_category = Category::whereRaw('top_cat_id is null')->get();
return view('backend.category.category')->with('list',$list)->with('top_category',$top_category);

    }


public function form($id=0){
$entry= new Category;
if($id>0){
    $entry=Category::find($id);
}
$category=Category::all();

       return view ('backend.category.form',compact('entry','category'));

}
    public function save($id=0)
    {
        $this->validate(request(), [
            'cat_name_az' => 'required',
            'cat_name_en' => 'required',
            'cat_name_ru' => 'required',
            'slug'         => (request('original_slug') != request('slug') ? 'unique:category,slug' : '')

        ]);
        $data = request()->only('top_cat_id','cat_name_az', 'cat_name_en','cat_name_ru','slug');
if(!request()->filled('slug')){
$data['slug']=str_slug(request('cat_name_az'));
if(Category::whereSlug($data['slug'])->count()>0)
return back()
->withInput()
->withErrors(['slug'=>'The slug has already been taken. ']);

}


        if ($id > 0) {
            $entry = Category::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Category::create($data);
        }
        return redirect()
            ->route('admin.categories')
            ->with('message', ($id > 0 ? 'Updated' : 'Saved'))
            ->with('message_type', 'success');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        // $category_product_num = $category->product()->count();
        // if ($category_product_num>0)
        // {
        //     return redirect()
        //     ->route('admin.categories')
        //         ->with('message', "This ategory has $category_product_num products . Bu yüzden silme işlemi yapılmamıştır.")
        //         ->with('message_type', 'warning');
        // }
        $category->product()->detach();
        $category->delete();
        return redirect()
            ->route('admin.categories')
            ->with('message', 'Deleted')
            ->with('message_type', 'success');
    }
}
