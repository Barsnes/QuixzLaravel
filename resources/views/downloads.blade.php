@extends('layouts.default')

@section('title', 'Downloads')

@section('content')
  <div class="downloads">

    <h1>Downloads</h1>
    <h6>Do not use our logo together with harmful, inappropriate, or controversial content.</h6>
    <h6>Do not edit our logo, colors, or artwork.</h6>
    <h6>Do not use our logo for commercial purposes without our consent.</h6>
    <h6>Do not use our logo if it is not 100% visible, or if it is scaled to be unrecognizable.</h6>
    <h6>Do not redistribute any of our artwork without our consent.</h6>

    <iframe src="https://drive.google.com/embeddedfolderview?id=1QWCvnv3X7yjcYavSyxPBi5umghDiR4M6#grid" width="100%" height="700" frameborder="0"></iframe>

  </div>

  <style>

    body {
      background-color: #121219;
    }

    .downloads {
      padding: 1rem 2rem;
      font-family: Lato;
      display: grid;
    }

    .downloads h1 {
      font-family: "Teko";
      font-size: 3rem;
      margin: 0;
    }

    .downloads h6 {
      margin: .2rem 0;
      font-size: .9rem
    }

  </style>

@endsection
