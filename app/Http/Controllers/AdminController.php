<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Existing methods remain unchanged...

    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successfully');
        return redirect()->back();
    }

    public function delet_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Updated Successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category_id = $request->category;
        $data->quantity = $request->qty;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::with('category')->paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $data->delete();
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted Successfully');
        return redirect()->back();
    }

    public function update_product($slug)
    {
        $data = Product::where('slug', $slug)->with('category')->first();
        $category = Category::all();
        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Edited Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%' . $search . '%')
            ->orWhereHas('category', function($query) use ($search) {
                $query->where('category_name', 'LIKE', '%' . $search . '%');
            })
            ->with('category')
            ->paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function view_order()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }
    
    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        return redirect('/view_order');
    }
    
    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_order');
    }

    public function view_users()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = $request->usertype;
        
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('User Updated Successfully');
        return redirect()->route('admin.users');
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        if (auth()->id() == $user->id) {
            toastr()->timeOut(5000)->closeButton()->addError('You cannot delete your own account');
            return redirect()->back();
        }
        $user->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('User Deleted Successfully');
        return redirect()->back();
    }

    public function user_search(Request $request)
    {
        $search = $request->search;
        $users = User::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('phone', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create_user()
    {
        return view('admin.users.create');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = $request->usertype;
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('User Created Successfully');
        return redirect()->route('admin.users');
    }

    // New method for viewing reviews
    public function view_reviews()
    {
        $reviews = Review::with(['product', 'user'])->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function delete_review($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Review Deleted Successfully');
        return redirect()->back();
    }
}