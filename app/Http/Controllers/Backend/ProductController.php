<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use File;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->filled('search')) {
            request()->flash();
            $search = request('search');
            $list = Product::where('product_name_en', 'like', "%$search%")
                ->orWhere('description_en', 'like', "%$search%")
                ->orderByDesc('id')
                ->paginate(10)
                ->appends('search', $search);
        } else{
            $list=Product::orderByDesc('id')->paginate(30);
        }
return view('backend.products.product')->with('list',$list);

    }
    public function form($id=0){
        $entry= new Product;
        $pr_category = [];

        if($id>0){
            $entry=Product::find($id);
            $pr_category = $entry->categories()->pluck('category_id')->all();

        }
        $categories = Category::all();

        // $entry=Product::all();

               return view ('backend.products.form',compact('entry','categories','pr_category'));

        }
            public function save($id=0)
            {
                $this->validate(request(), [
                    'product_name_az' => 'required',
                    'product_name_en' => 'required',
                    'product_name_ru' => 'required',
                    'description_az' => 'required',
                    'description_en' => 'required',
                    'description_ru' => 'required',
                    'price' => 'required',
                    'slug'         => (request('original_slug') != request('slug') ? 'unique:product,slug' : '')

                ]);
                $data = request()->only('product_name_az','product_name_en', 'product_name_ru',
                'description_az','description_en','description_ru','price','slug');
        if(!request()->filled('slug')){
        $data['slug']=str_slug(request('product_name_az'));
        if(Product::whereSlug($data['slug'])->count()>0)
        return back()
        ->withInput()
        ->withErrors(['slug'=>'The slug has already been taken. ']);
        }



        $categories = request('category');




                if ($id > 0) {
                    $entry = Product::where('id', $id)->firstOrFail();

                    // if(request()->hasFile('product_main_image')){
                    //     $imageName=str_slug(request()->file('product_main_image').'.'.request()->file('product_main_image')->getClientOriginalExtension());
                    //     request()->file('product_main_image')->move(public_path('uploads'),$imageName);
                    //     // $entry->product_main_image='uploads/'.$imageName;
                    //   }


                    $entry->update($data);
                    $entry->categories()->sync($categories);

                } else {

                    $entry = Product::create($data);
                    $entry->categories()->attach($categories);

                }



                if (request()->hasFile('product_main_image')) {
                    $this->validate(request(), [
                        'product_main_image' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
                    ]);

                    $image = request()->file('product_main_image');
                    //$urun_resmi = request()->urun_resmi;

                    $image_name = $entry->id . "-" . time() . "." . $image->extension();
                    //$dosyaadi = $urun_resmi->getClientOriginalName();
                    //$dosyaadi = $urun_resmi->hashName();

                    if ($image->isValid()) {
                        File::delete('uploads/products/' . $entry->product_main_image);

                        $image->move('uploads/products', $image_name);

                        Product::updateOrCreate(
                            ['id' => $entry->id],
                            ['product_main_image' => $image_name]
                        );
                    }
                }




                return redirect()
                    ->route('admin.product')
                    ->with('message', ($id > 0 ? 'Updated' : 'Saved'))
                    ->with('message_type', 'success');
            }
            public function destroy($id)
            {
                $product = Product::find($id);
                // $category_product_num = $category->product()->count();
                // if ($category_product_num>0)
                // {
                //     return redirect()
                //     ->route('admin.categories')
                //         ->with('message', "This ategory has $category_product_num products . Bu yüzden silme işlemi yapılmamıştır.")
                //         ->with('message_type', 'warning');
                // }
                // $category->product()->detach();
                $product->delete();
                return redirect()
                    ->route('admin.product')
                    ->with('message', 'Deleted')
                    ->with('message_type', 'success');
            }
        }
