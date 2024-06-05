<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // tarik data student dari db
        $students = Student::all();

        //panggil view dan kirim data students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }
    // method untuk menampilkan  form tambah student
    public function create(){
        return view('admin.contents.student.create');
    }

    //Method untuk menyimpan data student baru
    public function store(Request $request)
    {
            // Validasi data yang diterima
            $request->validate([
                'name' => 'required',
                'nim' => 'required|numeric',
                'major' => 'required',
                'class' => 'required',
            ]);

        // Simpan data ke db
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // Redirect ke halaman student
        return redirect('admin/student')->with('message', 'Data student berhasil di tambahkan!');
    }

    //Method untuk menampilkan halamann edit
    public function edit($id){
        //cari data student berdasarkan id
        $Student = Student::find($id); //Select * FROM student WHERE id = $id:

        return view('admin.contents.student.edit', [
            'student' => $Student
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request)
    {
        //cari data student berdasarkan id
        $Student = Student::find($id); //Select * FROM student WHERE id = $id:

    // Validasi data yang diterima
    $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
        'major' => 'required',
        'class' => 'required',
    ]);

    //Simpan Perubahan
    $Student->update([
        'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
    ]);

    // Redirect/kembalikan ke halaman student
    return redirect('admin/student')->with('message', 'Data student berhasil di edit!');

    }

    //method untuk menghapus student
    public function destroy($id){
         //cari data student berdasarkan id
         $Student = Student::find($id); //Select * FROM student WHERE id = $id:

         //hapus student
         $Student->delete();

         // Redirect/kembalikan ke halaman student
    return redirect('admin/student')->with('message', 'Data student berhasil di edit!');
    }

}