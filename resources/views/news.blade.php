@extends('layouts.default')
@section('title', 'News')

@section('content')
<div class="article_body">

    <div class="article_list">

      <a href="#"><img src="https://unsplash.it/1200/600" alt="Dummy desc" og:image></a>
      <h1><a href="#">A dummy title</a></h1>
      <h5>23 November 2018</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco...</p>
      <a href="#" class="article_readmore"><p>Read more...</p></a>
      <hr>

    </div>

    <div style="clear: both;"></div>

</div>
<style>

  .article_body{
    height: auto;
    width: calc(100% - 60%);
    background-color: #2B63AF;
    font-family:"Lato";
    padding: 1em 30%;
  }

  .article_body > div:first-of-type {
    width: 100%;
    margin: 0;
    padding: 0 1.5% 0 0;
    float: left;
  }

  .article_list img {
    width: 100%;
    box-shadow: 0 0 25px #00000070;
  }

  .article_list {
    width: 47%;
    padding: 0 1.5%;
    display: inline-block;
    float: left;
  }

  .article_list a {
    font-family: "Raleway";
    text-decoration: none;
    color: #FFF;
  }

  .article_list h1 {
    margin: .2em 0;
    font-size: 1.5rem
  }

  .article_readmore a {
    text-decoration: none;
  }

  .article_readmore p {
    color: #F8B52A;
    margin-bottom: .5em;
    font-family: "Lato"
  }

  .article_list hr {
    margin-bottom: 1.5em;
  }

  .article_list h5 {
    font-size: 1em;
    margin: .1rem;
    padding: 0;
  }

  @media (max-width:700px) {

    .article_list h1 {
      font-size: 1.2rem
    }

    .article_body{
      width: calc(100% - 20%);
      background-color: #2B63AF;
      font-family:"Lato";
      padding: 7em 10%;
    }

    .article_readmore {
      font-size: .8em
    }
  }

</style>

@endsection
