@extends('admin.layouts.master')


@section('content')

<div id="HTMLtoPDF">
    <h1 align="center">Payment slip</h1>
   
       
  

    <table style="width:100%">
      
      <tr>
        <td>Doctor Name</td>
        <td>:</td>
        <td>{{$p[0]->doctorname}}</td>
      </tr>
      <tr>
        <td>Fee</td>
        <td>:</td>
        <td>{{$p[0]->amount}}</td>
      </tr>

      <tr>
        <td>Payment Method</td>
        <td>:</td>
        <td>{{$p[0]->gateway}}</td>
      </tr>
      <tr>
        <td>Payment Date</td>
        <td>:</td>
        <td>{{$p[0]->date}}</td>
      </tr>
      <tr>
        <td>Payment Status</td>
        <td>:</td>
        <td>{{$p[0]->status}}</td>
      </tr>
    </table>
    
  

  
    
  </div>

  
  <a href="" class="btn btn-md offset-5 btn-success" onclick="HTMLtoPDF()">Print Payment Slip</a>
  <!-- Page content -->
 
<!-- Argon Scripts -->

<script src="{{asset('js/jspdf.js')}}"></script>
<script src="{{asset('js/jquery-2.1.3.js')}}"></script>
<script src="{{asset('js/pdfFromHTML.js')}}"></script>
    
@endsection