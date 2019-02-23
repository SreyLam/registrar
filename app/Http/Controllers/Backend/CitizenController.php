<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Citizen\Citizen;
use App\Models\Commune\Commune;
use App\Models\Gender\Gender;
use App\Models\Image\Image;
use App\Models\Lettertype\Lettertype;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class CitizenController extends Controller
{
    public function getCitizen()

    {
        $communes = Commune::all();
        $letterypes = Lettertype::all();
        $genders = Gender::all();
        $images = Image::all();
        $years = new Carbon();

        return view('backend.Citizen.add_citizen', compact('communes', 'letterypes', 'genders', 'years', 'images'));

    }

    public function getCitizenDatatable()
    {
        try {
            $citizens = Citizen::select('*')->with('commune', 'lettertype', 'gender_cityzen')->orderBy('created_at', 'desc');

            return Datatables::of($citizens)
                ->addColumn('commune', function ($citizen) {
                    return $citizen->commune->number;
                })
                ->addColumn('lettertype', function ($citizen) {
                    return $citizen->lettertype->number;
                })
                ->addColumn('gender', function ($citizen) {
                    return $citizen->gender_cityzen->gender_name;
                })
                ->editColumn('date_birth', function ($citizen) {
                    return convert_date_khmer((new Carbon($citizen->date_birth))->day) . ' ' .
                        convert_khmer_month((new Carbon($citizen->date_birth))->month) . ' ' .
                        convert_date_khmer((new Carbon($citizen->date_birth))->year) . ' <strong>(' . convert_khmer_day((new Carbon($citizen->date_birth))->diffInYears()) . 'ឆ្នាំ)</strong>';

                })
                ->editColumn('f_dob', function ($citizen) {
                    return convert_date_khmer((new Carbon($citizen->f_dob))->day) . ' ' .
                        convert_khmer_month((new Carbon($citizen->f_dob))->month) . ' ' .
                        convert_date_khmer((new Carbon($citizen->f_dob))->year);

                })
                ->editColumn('m_dob', function ($citizen) {
                    return convert_date_khmer((new Carbon($citizen->m_dob))->day) . ' ' .
                        convert_khmer_month((new Carbon($citizen->m_dob))->month) . ' ' .
                        convert_date_khmer((new Carbon($citizen->m_dob))->year);
                })
                ->editColumn('year', function ($citizen) {
                    return $citizen->year;

                })
                ->addColumn('actions', function ($citizen) {


                    $action = '<a href="/admin/citizens/' . $citizen->id . '/edit_citizen"><button type="button" class="btn btn-xs btn-success" aria-label="Left Align">
                                    <span class="fa fa-pencil" aria-hidden="true"></span>
                                </button>
                            </a>
                            
                             <a href="/admin/images/' . $citizen->id . '/print_image" target="_blank"><button type="button" class="btn btn-xs btn-primary" aria-label="Left Align">
                                    <i class="fa fa-print"></i>
                                </button>
                            </a>';
                    foreach (auth()->user()->roles as $role) {
                        if ($role->id == 1) {

                            $action .= '<button type="button" class="btn btn-xs btn-danger delete-citizen" aria-label="Left Align">
                                <input type="hidden" class="citizen_id" value="' . $citizen->id . '">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>';

                        }
                    }

                    return $action;

                })->make(true);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function storeCitizen()
    {

        $newCitzen = new Citizen();

        $newCitzen->commune_id = \request()->commune_id;
        $newCitzen->number_list = \request()->number_list;
        $newCitzen->number_book = \request()->number_book;
        $newCitzen->lettertype_id = \request()->lettertype_id;
        $newCitzen->name = \request()->name;
        $newCitzen->father_name = \request()->father_name;
        $newCitzen->mother_name = \request()->mother_name;
        $newCitzen->date_birth = \request()->date_birth;
        $newCitzen->child_order = \request()->child_order;
        $newCitzen->gender_id = \request()->gender;
        $newCitzen->year = \request()->year;
//        $newCitzen->year = convert_khmer_day(\request()->year);
        $newCitzen->place_birth = \request()->place_birth;
        $newCitzen->f_place_birth = \request()->f_place_birth;
        $newCitzen->f_dob = \request()->f_dob;
        $newCitzen->m_place_birth = \request()->m_place_birth;
        $newCitzen->m_dob = \request()->m_dob;
        $newCitzen->other = \request()->other;
        $newCitzen->created_at = Carbon::now();
        $newCitzen->updated_at = Carbon::now();

        if ($newCitzen->save()) {
//            dd($newCitzen);
            if (\request()->hasFile('citizen_image')) {


                $files = Input::file('citizen_image');
//                dd($files);
                foreach ($files as $index => $file) {
                    $newImage = new Image();
                    $newImage->imageable_id = $newCitzen->id;
                    $newImage->imageable_type = Citizen::class;
                    $destinationPath = public_path('img/backend/citizen');
                    $filename = $index . time() . '' . '.' . $file->getClientOriginalExtension();

                    $file->move($destinationPath, $filename);

                    $newImage->image_src = $filename;

                    $newImage->save();
                }
            }
        }

        return redirect('/admin/citizen');

    }


    public function getList_citizen()
    {
        $citizen = DB::table('citizens')->get();
//        dd($citizen);
        return view('backend.Citizen.citizen', compact('citizen'));
    }

    public function getDelete()
    {
        $citizen = Citizen::where('id', \request('citizen_id'))->first();
        $citizen_images = $citizen->images;
        foreach ($citizen_images as $image) {
            $image->delete();
            unlink('img/backend/citizen/' . $image->image_src);
        }


        if ($citizen->delete()) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => false]);
        }
    }

    public function getEdit_citizen($id)
    {
        $communes = Commune::all();
        $lettertypes = Lettertype::all();
        $genders = Gender::all();
        $citizen = Citizen::where('id', $id)->first();

        return View::make('backend.Citizen.edit_citizen', compact('citizen', 'communes', 'lettertypes', 'genders'));
    }

    public function postStore_citizen($id)
    {
        try {
            $input = Input::all();

            $citizen = DB::table('citizens')->where('id', $id)->update(array(
                'commune_id' => $input['commune_id'],
                'number_list' => $input['number_list'],
                'number_book' => $input['number_book'],
                'lettertype_id' => $input['lettertype_id'],
                'name' => $input['name'],
                'father_name' => $input['father_name'],
                'mother_name' => $input['mother_name'],
                'date_birth' => $input['date_birth'],
                'child_order' => $input['child_order'],
                'gender_id' => $input['gender'],
                'year' => $input['year'],
                // 'year' => convert_khmer_day($input['year']),
                'place_birth' => $input['place_birth'],
                'f_place_birth' => $input['f_place_birth'],
                'f_dob' => ($input['f_dob'] == '' ? null : $input['f_dob']),
                'm_place_birth' => $input['m_place_birth'],
                'm_dob' => ($input['m_dob'] == '' ? null : $input['m_dob']),
                'other' => $input['other'],
            ));


            if (\request()->hasFile('citizen_image')) {


                $files = Input::file('citizen_image');
                foreach ($files as $index => $file) {
                    $newImage = new Image();
                    $newImage->imageable_id = $id;
                    $newImage->imageable_type = Citizen::class;
                    $destinationPath = public_path('img/backend/citizen');
                    $filename = $index . time() . '' . '.' . $file->getClientOriginalExtension();

                    $file->move($destinationPath, $filename);

                    $newImage->image_src = $filename;
                    $newImage->saveOrFail();
                }
            }
            return Redirect::to('admin/citizen')->withFlashSuccess('Update Successfully');
        } catch (\Exception $exception) {
            return Redirect::back()->withFlashError($exception->getMessage());
        }
    }

    public function getImport_citizen()
    {
        return view('backend.Citizen.import_citizen');
    }

    /**
     * File Export Code
     *
     * @var array
     */
    public function downloadExcel(Request $request, $type)
    {
        $citizens = Citizen::get();
        $data = [];

        foreach ($citizens as $citizen) {

            $citizen_tmp = [];

            $tmp = Citizen::where('id', $citizen->id)->first()->commune->number;
            $tmp_letter_type = Citizen::where('id', $citizen->id)->first()->lettertype->number;
            $tmp_date_birth = convert_date_khmer((new Carbon($citizen->date_birth))->day) . ' ' .
                convert_khmer_month((new Carbon($citizen->date_birth))->month) . ' ' .
                convert_date_khmer((new Carbon($citizen->date_birth))->year);


            if ($citizen->f_dob == null) {
                $tmp_f_dob = '';
            } else {
                $tmp_f_dob = convert_date_khmer((new Carbon($citizen->f_dob))->day) . ' ' .
                    convert_khmer_month((new Carbon($citizen->f_dob))->month) . ' ' .
                    convert_date_khmer((new Carbon($citizen->f_dob))->year);
            }

            if ($citizen->m_dob == null) {
                $tmp_m_dob = '';
            } else {
                $tmp_m_dob = convert_date_khmer((new Carbon($citizen->m_dob))->day) . ' ' .
                    convert_khmer_month((new Carbon($citizen->m_dob))->month) . ' ' .
                    convert_date_khmer((new Carbon($citizen->m_dob))->year);
            }

//            $tmp_year = convert_khmer_day($citizen->year);
            $tmp_gender = Citizen::where('id', $citizen->id)->first()->gender_cityzen->gender_name;


            $citizen_item = Citizen::where('id', $citizen->id)->select('number_list', 'number_book', 'lettertype_id', 'name', 'father_name', 'mother_name', 'date_birth', 'child_order', 'gender_id', 'year', 'place_birth'
                , 'f_place_birth', 'f_dob', 'm_place_birth', 'm_dob', 'other')->first()->toArray();

            $citizen_tmp['លេខកូដឃុំ'] = $tmp;
            $citizen_tmp['លេខបញ្ជី'] = $citizen_item['number_list'];
            $citizen_tmp['លេខសៀវភៅ'] = $citizen_item['number_book'];
            $citizen_tmp['លេខកូដសំបុត្រ'] = $tmp_letter_type;
            $citizen_tmp['ឆ្នាំ'] = $citizen_item['year'];
            $citizen_tmp['ឈ្មោះសាមីខ្លូន'] = $citizen_item['name'];
            $citizen_tmp['កូនទី'] = $citizen_item['child_order'];
            $citizen_tmp['ភេទ'] = $tmp_gender;
            $citizen_tmp['ថ្ងៃខែឆ្នាំកំណើត'] = $tmp_date_birth;
            $citizen_tmp['ទីកន្លែងកំណើត'] = $citizen_item['place_birth'];
            $citizen_tmp['ឈ្មោះឪពុក'] = $citizen_item['father_name'];
            $citizen_tmp['ថ្ងៃខែឆ្នាំកំណើតឪពុក'] = $tmp_f_dob;
            $citizen_tmp['ទីកន្លែងកំណើតឪពុក'] = $citizen_item['f_place_birth'];
            $citizen_tmp['ឈ្មោះម្ដាយ'] = $citizen_item['mother_name'];
            $citizen_tmp['ថ្ងៃខែឆ្នាំកំណើតម្ដាយ'] = $tmp_m_dob;
            $citizen_tmp['ទីកន្លែងកំណើតម្ដាយ'] = $citizen_item['m_place_birth'];
            $citizen_tmp['ព័ត៍មានផ្សេងៗ'] = $citizen_item['other'];


//            $citizen_tmp['date_birth'] = $tmp_date_birth;
//            $citizen_tmp['year'] = $tmp_year;
//            $citizen_tmp['lettertype_id'] = $tmp_letter_type;
//            $citizen_tmp['gender_id'] = $tmp_gender;
            array_push($data, $citizen_tmp);
        }

        return Excel::create('ប្រព័ន្ធគ្រប់គ្រងស្ថិតិអត្រានុកូលដ្ខាន', function ($excel) use ($data) {
            $excel->sheet('mySheet', function ($sheet) use ($data) {

                $sheet->fromArray($data);
            });
        })->download($type);
    }


    public function importExcel(Request $request)
    {
        try {
            if ($request->hasFile('import_file')) {

                $file = $request->file('import_file');

                $results = null;

                $data = Excel::load($file, function () {
                })->get();


                if (!empty($data)) {

                    foreach ($data->toArray() as $key => $v) {

                        $commune = Commune::where('number', $v['commune_number'])->first();

                        $lettertype = Lettertype::where('number', $v['lettertype_number'])->first();
                        $gender = Gender::where('gender_name', $v['gender'])->first();
                        if (!empty($v)) {

                            $insert = [
                                'commune_id' => $commune->id,
                                'number_list' => convert_khmer_day($v['number_list']),
                                'number_book' => convert_khmer_day($v['number_book']),
                                'lettertype_id' => $lettertype->id,
                                'year' => convert_khmer_day($v['year']),
                                // 'year' => $v['year'],
                                'name' => $v['name'],
                                'child_order' => convert_khmer_day($v['child_order']),
                                'gender_id' => $gender->id,
                                'date_birth' => $v['date_birth'],
                                'place_birth' => $v['place_birth'],
                                'father_name' => $v['father_name'],
                                'f_dob' => $v['f_dob'],
                                'f_place_birth' => $v['f_place_birth'],
                                'mother_name' => $v['mother_name'],
                                'm_dob' => $v['m_dob'],
                                'm_place_birth' => $v['m_place_birth'],
                                'other' => $v['other'],
                            ];

                            $citizens = Citizen::orWhere($insert)->get();
                            if (count($citizens) == 0) {
                                $insert['created_at'] = Carbon::now();
                                dump($insert);
                                Citizen::insert($insert);
                            }
                        }
                    }

                    return Redirect::to('admin/citizen')->with('success', 'Insert Record successfully.');
                }

            } else {

            }

            return back()->with('error', 'Please Check your file, Something is wrong there.');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function getPrint_image($id)
    {
        $images = Image::where('imageable_id', $id)->get();

        return view('backend.Citizen.print_image', compact('images'));

    }

    /**
     * @return array
     * @throws \Exception
     */
    public function delete_image()
    {

        $image = Image::find((int)\request('id'));

        if ($image instanceof Image) {
            unlink(public_path('img/backend/citizen/' . $image->image_src));
            $image->delete();
            return ['status' => true];
        }

        return ['status' => false];
    }
}
