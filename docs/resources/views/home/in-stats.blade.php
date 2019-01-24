@extends('layouts.master')
@section('title','Stats')
@section('pagebody')

<!-- Start Inner Contents -->       
        
     

<section class="myaccount-header">
    <div class="container">
    <h1>Stats</h1>
        </div>
</section>
<section class="myaccount-body">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="container-wrapper padding0">
            <div class="border-top">
                            <div class="price-wrap  stats">
                <h2>Statistical Data</h2>
                <table>
                  <tr>
                    <td>1</td>
                    <th>Total amount money invested by investors</th>
                    <?php $sqlQuery = "SELECT sum(amount) as funds FROM project_funding WHERE project_from = 2 ";
                    $invesment = DB::select(DB::raw($sqlQuery)); ?>
                    <th align="center">$ {{$invesment[0]->funds}}</th>
                  </tr>
                  <tr>
                    <td>2</td>
                    <th>Total amount of money donated by supporters </th>
                    <?php $sqlQuery = "SELECT sum(amount) as funds FROM project_donations WHERE project_from = 2 ";
                    $donation = DB::select(DB::raw($sqlQuery)); ?>
                    <th align="center">$ {{$donation[0]->funds}}</th>
                  </tr>
                                    <tr>
                    <td>3</td>
                    <th>The number of Diaspora based enterpreneurs</th>
                    <?php $entrepreneurs = DB::table('ent_company')->where('category','LIKE','1%')->count(); ?>
                    <th colspan="2" align="center">{{$entrepreneurs}}</th>
                  </tr>
                                    <tr>
                    <td>4</td>
                    <th>The number of Social Entrepreneur based enterpreneurs</th>
                    <?php $entrepreneurs = DB::table('ent_company')->where('category','LIKE','2%')->count(); ?>
                    <th colspan="2" align="center">{{$entrepreneurs}}</th>
                  </tr>
                                    <tr>
                    <td>5</td>
                    <th>The number of Women based enterpreneurs</th>
                    <?php $entrepreneurs = DB::table('ent_company')->where('category','LIKE','4%')->count(); ?>
                    <th colspan="2" align="center">{{$entrepreneurs}}</th>
                  </tr>
                                    <tr>
                    <td>6</td>
                    <th>The number of Youth based enterpreneurs</th>
                    <?php $entrepreneurs = DB::table('ent_company')->where('category','LIKE','5%')->count(); ?>
                    <th colspan="2" align="center">{{$entrepreneurs}}</th>
                  </tr>
                                    <!--
                  <tr>
                    <td>7</td>
                    <th> The number of youth entrepreneurs trainers </th>
                    <th align="center">--</th>
                  </tr>
                  <tr>
                    <td>8</td>
                    <th> The number of mentors, advisors, and coaches</th>
                    <th align="center">2 Supporters</th>
                  </tr>
                  
                  -->
                  <tr>
                    <td>9</td>
                    <th> The number of countries hosting AIM enterpreneurs</th>
                    <th>2</th>
                  </tr>
                  <tr>
                    <td>10</td>
                    <th> The number of publications on youth employment</th>
                    <th align="center">--</th>
                  </tr>
                  <tr>
                    <td>11</td>
                    <th>The number of investors</th>
                    <?php $investors = DB::table('userdetails')->where('groupid','4')->count(); ?>
                    <th colspan="2" align="center">{{$investors}}</th>
                  </tr>
                  <tr>
                    <td>12</td>
                    <th>The number of supporters</th>
                    <?php  ?>
                    <th colspan="2" align="center">{{$supporters}}</th>
                  </tr>
                  <tr>
                    <td>13</td>
                    <th>The number of youth jobs</th>
                   <th align="center">0</th>
                  </tr>
                  <tr>
                   <td>14</td>
                    <th>The number of male entrepreneurs</th>
                    <th>1</th>
                  </tr>
                  <tr>
                    <td>15</td>
                    <th>The number of female entrepreneurs</th>
                    <th>0</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection