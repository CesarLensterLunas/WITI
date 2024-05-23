@extends('layouts.app')

@section('content') 
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <!-- Add Fees button -->
                    <!-- <select class="form-control" name="semester" required>
                        <option value="">Semester</option>
                        <option value="1">1st Sem</option>
                        <option value="2">2nd Sem</option>
                    </select> -->
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Grades 1 Semester</h3>
                        </div>
                        <div class="card-body p-0">
                             <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Description</th>
                                        <th>Semester Grade</th>
                                        <th>Units Earned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                @forelse ($getGrades as $grade)
                                        <tr>
                                            <td>{{ $grade->subject_code }}</td>
                                            <td>{{ $grade->description }}</td>
                                            <td>{{ $grade->semester_grade }}</td>
                                            <td>{{ $grade->units_earned }}</td>
                                        </tr>
                                    @empty
                                     
                                        
                                        <tr>
                                            <td>PHYS101</td>
                                            <td>Physics Fundamentals</td>
                                            <td>88</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>ENG101</td>
                                            <td>English Composition</td>
                                            <td>82</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>HIST101</td>
                                            <td>World History</td>
                                            <td>87</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>BIO101</td>
                                            <td>Introduction to Biology</td>
                                            <td>91</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>CHEM101</td>
                                            <td>Introduction to Chemistry</td>
                                            <td>89</td>
                                            <td>3</td>
                                        </tr>
                                        <tr>
                                            <td>GEOG101</td>
                                            <td>Introduction to Geography</td>
                                            <td>86</td>
                                            <td>3</td>
                                        </tr>
                                        
                                    @endforelse
                                </tbody>
                            </table> 


                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
