@extends('Layout.master')
@section('title')
About
@endsection
@section('section')
<div class="page-header text-center scrap-container">
    <hr size="8">
    <div class="imgdimres"><img src="http://www.interestingreality.com/wp-content/uploads/2020/01/Insurance-broking.jpg" alt="About mBrockerage" class="img-fluid" >
    </div>
    <div style="margin-left:30px; margin-right:30px; text-align:justify; text-justify:inter-word" >
      <p class="aboutPara"> <strong>mBrockage</strong>  is an insurance broker software for insurance brokers enabling in the design of customised and personalised software solutions for customers and insurance management.
          It leverages cutting edge technology combined with their knowledge and experience for increase and retention of business for different customer segments.
          mBrockage helps insurance brokers perform this role effectively and efficiently.<br>
          Insurance Brokers represent you, the customer, and are licensed to give you policies from any insurance company.
          They can provide expert advice on the insurance policies suitable to you and are paid a brokerage by the company whose policy you finally choose.<br>
          When you buy insurance from us, you get more than just financial safety. You also get: our promise of simplifying complex insurance terms and conditions,
          quick stress-free claims, instant quotes from top insurers and being present for you in the toughest of times.


      </p>
      <div class="row " >
        <h1 class="col-sm-12 center aboutHead" style="text-align: center;">What Our Customer Say</h1>
      </div>
      <hr>
      <center>
      <div class="row">
        <div class="row home-tile">
          <div class="col-sm-6 home-title-text">
            <div class="row">
              <h2 class="aboutHead">Salil</h2>
              <p class="aboutPara">The services provided by mBrockage are extremely helpful in making the right choice.
                  Overall I had a good experience with mBrockage.</p>
            </div>
          </div>
          <div class="col-sm-6 home-tile-graphics">
            <div class="center home-grid"><img src="https://i.pinimg.com/originals/c3/33/27/c333273fcfc3198e93df380c0cfc0437.jpg" alt="Making a change"  style="max-height: 200px; max-width:150px"></div>
          </div>
        </div>
        <div class="row home-tile">
          <div class="col-sm-6 home-tile-graphics">
            <div class="center home-grid"><img src="https://thumbs.dreamstime.com/b/shoulder-portrait-thirty-years-old-bearded-man-young-adult-136889723.jpg" alt="Technological touch to traditional ways" class="right home-grid"  style="max-height: 200px; max-width:150px;">
            </div>
          </div>
          <div class="col-sm-6 home-title-text">
            <div class="row">
              <h2 class="aboutHead">Ajay </h2>
              <p class="aboutPara">Thanking you very much for your support for getting our policy quickly, I would appreciate your work.</p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row home-tile">
            <div class="col-sm-6 home-title-text">
              <div class="row">
                <h2 class="aboutHead">Santosh  &amp; customers.</h2>
                <p class="aboutPara">I would like to thank the website 'www.mBrockage.com' because of which i could get a good policy.
                  Thanks for correction done in time and really Appreciated....!!     GOOD TO HAVE mBrockage..!! LIFE IS EASY WITH YOU..!!
                </p>
              </div>
            </div>
            <div class="col-sm-6 home-tile-graphics">
              <div class="center home-grid"><img src="https://i.pinimg.com/originals/bc/6e/01/bc6e01f7267838a301d66e2929068cc5.jpg" alt="less effort, more money" class="home-grid"  style="max-height: 200px; max-width:150px">               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </center>
  </div>
</div>
<div class="container clearfix">
    {{-- <br><br> --}}
    <table class="table" >

        <tbody>
            <tr>
                <td>
                <div class="mvv_item">
                  <h3 class="mvv_head aboutHead">Our Mission</h3>
                  <div class="mvv_img">
                     <img src="https://static.pbcdn.in/cdn/images/career/mission.png" style="width: 200px; height:200px;" alt="" class="img-fluid" >
                  </div>
                  <p class="aboutPara">Building a safety net for households in India.</p>
               </div>
           </td>
                <td> <div class="mvv_item">
                  <h3  class="mvv_head aboutHead">Our Values</h3>
                  <div class="mvv_img">
                     <img src="https://static.pbcdn.in/cdn/images/career/values.png" style="width: 200px; height:200px;" alt=""  class="img-fluid">
                  </div>
                  <p class="aboutPara">Fairness to all our stakeholders</p>
               </div></td>
               <td><div class="mvv_item">
                  <h3 class="mvv_head aboutHead">Our Vision</h3>
                  <div class="mvv_img">
                     <img src="https://static.pbcdn.in/cdn/images/career/vision.png" alt="" style="width: 200px; height:200px;"  class="img-fluid" >
                  </div>
                  <p class="aboutPara">A healthy and well-protected India</p>
               </div></td>
            </tr>
        </tbody>

    </table>
</div>
<style>
    .aboutPara{
        color: black;
    }
    .aboutHead{
        color: blue;
    }
</style>

@endsection
