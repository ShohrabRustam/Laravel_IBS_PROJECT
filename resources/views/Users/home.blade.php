@extends('Layout.master')
@section('title')
    Home
@endsection
@section('section')
    <div class="feature-container">
        <img src="https://akm-img-a-in.tosshub.com/businesstoday/images/story/201807/insurance-1991216_960_720_660_071118073217.jpg"
            alt="Flexbox Feature">
        <h2>Life Insurance</h2>
        <p> Death is a reality for everyone. You want to make sure that your family is protected after your
            death. Life insurance policies help to pay off debts so that they are not a burden for your family.Life
            insurance gives you peace of mind that your spouse and your children are financially stable after your passing.
        </p>
    </div>
    <div class="feature-container">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThZI_wjB2pCnPic0aLSwC5LyAgZUEeXZPQwA&usqp=CAU"
            alt="Flexbox Feature">
        <h2>Health Insurance</h2>
        <p> Health insurance provides people with a much needed financial backup at
            times of medical emergencies. Health risks and uncertainties are a part of life.
            Life insurance gives you peace of mind that your spouse and your children are financially stable after your
            passing.

        </p>
    </div>
    <div class="feature-container">
        <img src="https://www.icicilombard.com/docs/default-source/assets/campaign/images/asset-20.png"
            alt="Flexbox Feature" style="max-height: 280px">
        <h2>Bike Insurance </h2>
        <p>It helps you stay stress-free - In case you are not a confident driver, getting your car adequately insured will
            help in reducing the stress of driving. Even for experienced drivers, car insurance is a necessity as they may
            get involved in accidents for no fault of their own.
            .</p>
    </div>
    <div class="feature-container">
        <img src="https://www.icicilombard.com/docs/default-source/assets/freshlook/images/car-keys.png"
            alt="Flexbox Feature" style="max-height: 280px">
        <h2>Car Insurance </h2>
        <p>If your car is involved in an accident that results in damage or loss to the property of any third parties, it is
            covered under the car insurance. Furthermore, if you face any legal liabilities in case of any bodily injury or
            death of a third party, your car insurance protects you against the same.
        </p>
    </div>
    <style>
        .feature-container {
            margin-left: 20px;
            margin-right: 20px;
            min-width: 100px;
            max-width: 250px;
        }

    </style>
@endsection
