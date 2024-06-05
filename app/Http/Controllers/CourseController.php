<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index (){
        $courses = Course::all();
        return view ('admin.contents.course.index', [
            'courses' => $courses
        ]);
    }

        // method untuk menampilkan  form tambah course
        public function create(){
            return view('admin.contents.course.create');
        }
    
        //Method untuk menyimpan data course baru
        public function store(Request $request)
        {
                // Validasi data yang diterima
                $request->validate([
                    'name' => 'required',
                    'category' => 'required',
                    'description' => 'required',
                ]);
    
            // Simpan data ke db
            Course::create([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
            ]);
    
            // Redirect ke halaman course
            return redirect('admin/course')->with('message', 'Data course berhasil di tambahkan!');
        }
    
        //Method untuk menampilkan halamann edit
        public function edit($id){
            //cari data course berdasarkan id
            $Course = Course::find($id); //Select * FROM course WHERE id = $id:
    
            return view('admin.contents.course.edit', [
                'course' => $Course
            ]);
        }
    
        //method untuk menyimpan hasil update
        public function update($id, Request $request)
        {
            //cari data course berdasarkan id
            $Course = Course::find($id); //Select * FROM course WHERE id = $id:
    
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
    
        //Simpan Perubahan
        $Course->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);
    
        // Redirect/kembalikan ke halaman course
        return redirect('admin/course')->with('message', 'Data course berhasil di edit!');
    
        }
    
        //method untuk menghapus course
        public function destroy($id){
             //cari data course berdasarkan id
             $Course = Course::find($id); //Select * FROM course WHERE id = $id:
    
             //hapus course
             $Course->delete();
    
             // Redirect/kembalikan ke halaman course
        return redirect('admin/course')->with('message', 'Data course berhasil di edit!');
        }
}
