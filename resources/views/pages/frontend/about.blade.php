@extends('layouts.frontend')

@section('title', 'Tentang Kami')

@section('banner')
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Hubungi Kami</h4>
              <h2>Tentang Kami</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('content')
<section class="contact-us">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-12">
          <div class="down-contact">
            <div class="row">
              <div class="col-lg-8">
                <div class="sidebar-item contact-form">
                  <div class="sidebar-heading">
                    <h2>Lokasi</h2>
                  </div>
                  <div class="content">
                    <div id="map">
                      {{-- <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510239.39619426127!2d114.85201147378032!3d-2.4250029866989924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de53b0d2c0a529d%3A0xcf60421e7792a853!2sNorth%20Hulu%20Sungai%20Regency%2C%20South%20Kalimantan!5e0!3m2!1sen!2sid!4v1606555156943!5m2!1sen!2sid" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="sidebar-item contact-information">
                  <div class="sidebar-heading">
                    <h2>Informasi Kontak</h2>
                  </div>
                  <div class="content">
                    <ul>
                      <li>
                        <img src="{{ asset('assets/images/bupati.jpg') }}" class="img-thumbnail" alt="">
                        <div class="row mt-4 text-center  ">
                          <div class="col-6">
                            <h6>Bupati Hulu Sungai Utara</h6>
                            <span>Drs. H. Abdul Wahid, H.K., M.M., M.Si.</span>
                          </div>
                          <div class="col-6">
                            <h6>Wakil Bupati Hulu Sungai Utara</h6>
                            <span>H. Husairi Abdi, Lc.</span>
                          </div>
                        </div>
                      </li>
                      <li>
                        <h6>090-484-8080</h6>
                        <span>PHONE NUMBER</span>
                      </li>
                      <li>
                        <h6>info@company.com</h6>
                        <span>EMAIL ADDRESS</span>
                      </li>
                      <li>
                        <h6>123 Aenean id posuere dui, 
                            <br>Praesent laoreet 10660</h6>
                        <span>STREET ADDRESS</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
@endsection