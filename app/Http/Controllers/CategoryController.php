<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\DB as FacadesDB;
use Log;

class CategoryController extends Controller
{

    //  category listing
    public static function categoryList(){
        $categoryMaster = DB::table('category_master')->where('parent_id',0)->select('id','name as Category','position','image','status as Status')->get();
        return $categoryMaster;
    }

    // add category
    public static function addCategory(Request $request){
       // dd($request->all());
        $insertCategoryId =  DB::table('category_master')->insertGetId([
            "name"=>$request->Category,
            "slug"=>$request->Category,
            "position"=>$request->position,
            "status"=>($request->Status === 'true' ? 1 :0),
            "unique_id"=>(string) Str::uuid()
        ]);
        $categoryData = DB::table('category_master')->where('id',$insertCategoryId)->select('id','name as Category','position','image','status as Status')->first();
        return $categoryData;
    }

    //  update category
    public static function updateCategory(Request $request){

        $updateCategoryStatus =  DB::table('category_master')->where('id',$request->id)->update([
            "name"=>$request->Category,
            "slug"=>$request->Category,
            "position"=>$request->position,
            "status"=>($request->Status === 'true' ? 1 :0)
        ]) ;
        $categoryData = DB::table('category_master')->where('id',$request->id)->select('id','name as Category','position','image','status as Status')->first();
        return $categoryData;
    }

    //  delete category
    public static function deleteCategory(Request $request){
        $deleteCategoryStatus =  DB::table('category_master')->where('id',$request->id)->delete();
        return;
    }


    // api to get drop down category
    public static function getDropDownCategoryList(){
        $categoryList  = DB::table('category_master')->where('position',0)->select('id as Id','name as Name')->get();
        return  response()->json($categoryList);
    }
    // api to get drop down category
    public static function getDropDownSubCategoryList(){
        $categoryList  = DB::table('category_master')->where('position',1)->select('id as Id','name as Name')->get();
        return  response()->json($categoryList);

    }
   //  get sub category list
   public static function getSubCategoryList(){
          $subCategoryMaster = DB::table('category_master')->where('position',1)->select('id','name as SubCategory','image','status as Status','parent_id')->get();
        $subCategoryMaster = collect($subCategoryMaster)->map(function ($item, $key) {

            if($item->parent_id != 0){
                $categoryName = DB::table('category_master')->where('id',$item->parent_id)->select('id','name')->first();
                if(isset($categoryName)){
                     $item->Category = @$categoryName->name;
                $item->CategoryId = @$categoryName->id;
                }

            }else{
                $item->Category= null;
                $item->CategoryId = null;
            }

            return $item;
        });
        return  response()->json(['subCategoryMaster' =>  $subCategoryMaster]);
    }
    // add sub  category
    public static function addSubCategory(Request $request){
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/subcategory'), $imageName);
        $insertCategoryId =  DB::table('category_master')->insertGetId([
            "name"=>$request->SubCategory,
            "slug"=>$request->SubCategory,
            "parent_id"=>$request->CategoryId,
            "position"=>1,
            "status"=>($request->Status === 'true' ? 1 :0),
            "image"=>'/images/subcategory/'. $imageName,
            "unique_id"=>(string) Str::uuid()
        ]);
        $categoryData = DB::table('category_master')->where('id',$insertCategoryId)->select('id','name as SubCategory','image','status as Status')->first();
        if($request->CategoryId){
            $categoryName = DB::table('category_master')->where('id',$request->CategoryId)->select('id','name')->first();
            $categoryData->Category = $categoryName->name;
            $categoryData->CategoryId = $categoryName->id;
        }else{
            $categoryData->Category= null;
            $categoryData->CategoryId = null;
        }
        return $categoryData;
    }

        //  update sub category
        public static function updateSubCategory(Request $request){
             $data = [
                "name"=>$request->SubCategory,
                "slug"=>$request->SubCategory,
                "parent_id"=>$request->CategoryId,
                "position"=>1,
                "status"=>($request->Status === 'true' ? 1 :0),

             ];
            if(isset($request->image)){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/subcategory'), $imageName);
                $data["image"] ='/images/subcategory/'. $imageName;
            }
            $updateCategoryStatus =  DB::table('category_master')->where('id',$request->id)->update( $data) ;
            $categoryData = DB::table('category_master')->where('id',$request->id)->select('id','name as SubCategory','image','status as Status')->first();
            if($request->CategoryId){
                $categoryName = DB::table('category_master')->where('id',$request->CategoryId)->select('id','name')->first();
                $categoryData->Category = $categoryName->name;
                $categoryData->CategoryId = $categoryName->id;
            }else{
                $categoryData->Category= null;
                $categoryData->CategoryId = null;
            }
            return $categoryData;
        }
            //  delete  Sub category
        public static function deleteSubCategory(Request $request){
            $deleteCategoryStatus =  DB::table('category_master')->where('id',$request->id)->delete();
            return;
        }

        //  get sub category list
   public static function getSubSubCategoryList(){
    $subCategoryMaster = DB::table('category_master')->where('position',2)->select('id','name as SubSubCategory','image','status as Status','parent_id')->get();
    $subCategoryMaster = collect($subCategoryMaster)->map(function ($item, $key) {

        if($item->parent_id != 0){
            $categoryName = DB::table('category_master')->where('id',$item->parent_id)->select('id','name')->first();
            $item->SubCategory = isset($categoryName->name) ? $categoryName->name : null;
            $item->SubCategoryId = isset($categoryName->id) ?$categoryName->id :null;
        }else{
            $item->SubCategory= null;
            $item->SubCategoryId = null;
        }

        return $item;
    });
    return  response()->json($subCategoryMaster);

}
// add sub  category
public static function addSubSubCategory(Request $request){
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images/subsubcategory'), $imageName);
    $insertCategoryId =  DB::table('category_master')->insertGetId([
        "name"=>$request->SubSubCategory,
        "slug"=>$request->SubSubCategory,
        "parent_id"=>$request->SubCategoryId,
        "position"=>2,
        "status"=>($request->Status === 'true' ? 1 :0),
        "image"=>'/images/subsubcategory/'. $imageName,
        "unique_id"=>(string) Str::uuid()
    ]);
    $categoryData = DB::table('category_master')->where('id',$insertCategoryId)->select('id','name as SubSubCategory','image','status as Status')->first();
    if($request->SubCategoryId){
        $categoryName = DB::table('category_master')->where('id',$request->SubCategoryId)->select('id','name')->first();
        $categoryData->SubCategory = $categoryName->name;
        $categoryData->SubCategoryId = $categoryName->id;
    }else{
        $categoryData->SubCategory= null;
        $categoryData->SubCategoryId = null;
    }
    return $categoryData;
}

    //  update sub category
    public static function updateSubSubCategory(Request $request){
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/subsubcategory'), $imageName);
        $updateCategoryStatus =  DB::table('category_master')->where('id',$request->id)->update([
            "name"=>$request->SubSubCategory,
            "slug"=>$request->SubSubCategory,
            "parent_id"=>$request->SubCategoryId,
            "position"=>2,
            "status"=>($request->Status === 'true' ? 1 :0),
            "image"=>'/images/subsubcategory/'. $imageName
        ]) ;
        $categoryData = DB::table('category_master')->where('id',$request->id)->select('id','name as SubSubCategory','image','status as Status')->first();
        if($request->SubCategoryId){
            $categoryName = DB::table('category_master')->where('id',$request->SubCategoryId)->select('id','name')->first();
            $categoryData->SubCategory = $categoryName->name;
            $categoryData->SubCategoryId = $categoryName->id;

        }else{
            $categoryData->SubCategory= null;
            $categoryData->SubCategoryId = null;
        }
        return $categoryData;
    }
        //  delete  Sub category
    public static function deleteSubSubCategory(Request $request){
        $deleteCategoryStatus =  DB::table('category_master')->where('id',$request->id)->delete();
        return;
    }



    //  web sub category
    public static function ViewSubCategory(Request $request,$id){
        $categoryLists =  DB::table('category_master')->where('status',1)->where('position',0)->get();
        $subCategoryData = DB::table('category_master')->where('id',$id)->first();
        $subCategoryData->subsubCategoryList = DB::table('category_master')->where('parent_id',$id)->where('position','2')->get();
        return view('subCategory',['subCategoryLists'=>$subCategoryData,'categoryLists'=> $categoryLists]);
    }



    //  mobile api
    //  get category
    public static function getCategoryList(){
        try{

            $category = DB::table('category_master')->select('id','name','image')->where('status',1)->where('position',0)->orderBy('position','asc')->get();
            $category = collect($category)->map(function($value) {
                if(isset($value->image)){
                   $value->image = env('APP_URL').$value->image;
               };
               return $value ;
           });
            $subCategoryData = DB::table('category_master')->where('position',1)->get()->toArray();
            $subCategoryData = collect($subCategoryData)->map(function($value) {
                if(isset($value->image)){
                   $value->image = env('APP_URL').$value->image;
               };
               return $value ;
           });
           $subsubCategoryData = DB::table('category_master')->select('parent_id')->where('position',2)->get();
            // $category = collect($category)->map(function($data) use($subCategoryData, $subsubCategoryData){
            //     if($data->parent_id === 0){

            //         // sub category section
            //         $subCategoryData = collect($subCategoryData)->where('parent_id',$data->id)->values()->all();

            //         if(count($subCategoryData) > 0){
            //             $subsubCategoryData = collect($subCategoryData)->map(function($item)use($subsubCategoryData){
            //                 $subsubCategoryData =  collect($subsubCategoryData)->where('parent_id',$item->id)->values()->all();
            //                 $item->subsubCategoryData =  $subsubCategoryData;
            //                 return $item;
            //             });
            //             $data->subCategory =   $subsubCategoryData;
            //         }else{
            //             $data->subCategory =   $subCategoryData;
            //         }
            //     }else{
            //         $data->subCategory = [];
            //     }
            //     return $data;
            // });

            $category = collect($category)->map(function ($data) use($subCategoryData,$subsubCategoryData){
                $subCategory = collect($subCategoryData)->filter(function ($value) use($data,$subsubCategoryData){ return $value->parent_id == $data->id;})->values();
                $subCategory = collect($subCategory)->map(function ($data) use($subsubCategoryData){
                    $subsubCategoryData = collect($subsubCategoryData)->where('parent_id',$data->id)->all();
                    $data->subsubCategoryCount = count($subsubCategoryData);
                    return $data;
                });
                $data->subCategoryCount = count($subCategory);
                $data->subCategoryList = $subCategory;
                return $data;
            });

            return response()->json([
                "status"=>true,
                "message"=>"Category List",
                "data"=>$category
            ]);

        }catch(Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>"something went wrong...",
                "data"=>[]
            ]);
        }
    }
    //  get sub category list
    public static function getSubCategoryData(Request $request,$id){
        try{
            $subCategoryList = DB::table('category_master')->select('id','name','image')->where('parent_id',$id)->where('status',1)->get();
            $subCategoryList = collect($subCategoryList)->map(function($value) {
                if(isset($value->image)){
                   $value->image = env('APP_URL').$value->image;
               };
               return $value ;
           });
            $subsubCategoryData = DB::table('category_master')->select('parent_id')->where('position',2)->get();
            $subsubCategoryData = collect($subsubCategoryData)->map(function($value) {
                if(isset($value->image)){
                   $value->image = env('APP_URL').$value->image;
               };
               return $value ;
           });
            $subCategory = collect($subCategoryList)->map(function ($data) use($subsubCategoryData){
                $subsubCategoryData = collect($subsubCategoryData)->where('parent_id',$data->id)->all();
                $data->subsubCategoryCount = count($subsubCategoryData);
                return $data;
            });
            return response()->json([
                "status"=>true,
                "message"=>"Sub Category List",
                "data"=>$subCategory
            ]);

        }catch(Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>"something went wrong...",
                "data"=>[]
            ]);
        }

    }

    //  get sub category list
    public static function getSubSubCategoryData(Request $request,$id){
        try{
            $subSubCategoryList = DB::table('category_master')->select('id','name','image')->where('parent_id',$id)->where('status',1)->get();
            $subSubCategoryList = collect($subSubCategoryList)->map(function($value) {
                if(isset($value->image)){
                   $value->image = env('APP_URL').$value->image;
               };
               return $value ;
           });
            return response()->json([
                "status"=>true,
                "message"=>"Sub Sub Category List",
                "data"=>$subSubCategoryList
            ]);

        }catch(Exception $e){
            return response()->json([
                "status"=>false,
                "message"=>"something went wrong...",
                "data"=>[]
            ]);
        }

    }
}
