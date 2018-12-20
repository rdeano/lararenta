<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
use DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Check if user is loggedin
      if (Auth::check()) {

      }else {
          return redirect('login');
      }

      // controller
      $controller = "item";

      $categories =  DB::table('category')->get();
      $userid = Auth::id();

      // $sql = "SELECT item.name,item.description,item.amount_for_rent,item.item_status,item.picture,
      //                 category.name as categoryname
      //                 FROM item
      //                 LEFT JOIN category
      //                 ON item.category_id = category.idea
      //                 WHERE item.user_id = '$userid'
      //                 ";

      $items = DB::table('item')
              ->where('item.user_id',$userid)
              ->join('category','item.category_id','=','category.id')
              ->select('item.*','category.name as categoryname')
              ->get();


      return view('item.index')
            ->with('controller', $controller)
            ->with('categories',$categories)
            ->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = $request->action;

        if ($action == "addnewitem") {
            $item = new Item;

              if ($request->file('picture') == "") {
                $path = "upload/default.png";
            }else {
                $path = $request->file('picture')->store('upload') ;
            }

            $item->user_id = Auth::id();
            $item->category_id = $request->category;
            $item->name = $request->name;
            $item->description = $request->desc;
            $item->amount_for_rent = $request->amountforrent;
            $item->item_status = "available";
            $item->picture = $path;
            $item->save();

        }

        return redirect('item');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $id = $request->itemid;
        //
        // echo "The id is: " . $id;

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('item')->with('success','Item has been deleted succesfully');
    }


    // Custom function
    public function selectQuery()
    {
        $action = $_GET["action"];

        if ($action == "updateitem") {
            $id = $_GET["id"];

            $result = DB::table('item')->where('id',$id)->get();
            echo json_encode($result);
        }

        if ($action == "showownerinfo") {
            $id = $_GET["userid"];

            $result = DB::table('users')->where('id',$id)->get();
            echo json_encode($result);
        }
    }

    public function updateQuery()
    {
        $id = $_POST["itemid"];
        $category = $_POST["category"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $amountforrent = $_POST["amountforrent"];

        if ($_FILES['picture']['size'] == 0) {
            DB::table('item')
              ->where('id',$id)
              ->update(
                [
                  'category_id' => $category,
                  'name' => $name,
                  'description' => $desc,
                  'amount_for_rent' => $amountforrent,
                ]);


        }else {
            $filename = $_FILES["picture"]["name"];
            $ext = end((explode(".",$filename)));

            $picture = md5(basename($_FILES["picture"]["name"]).microtime());
            // echo $picture;
            // exit();
            $target_dir = "storage/app/upload/";
            $target_file = $target_dir . $picture .".".$ext;

            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

            DB::table('item')
              ->where('id',$id)
              ->update(
                [
                  'category_id' => $category,
                  'name' => $name,
                  'description' => $desc,
                  'amount_for_rent' => $amountforrent,
                  'picture' => "upload/".$picture.".".$ext
                ]);

        }



        return redirect('item')->with('success','Item has been updated');




    }
}
