@extends('layouts.master')


@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="swiper-wrapper">
        @foreach ($products as $product)
            <div class="swiper-slide product-card product-card_style8">
                <div class="pc__img-wrapper pc__img-wrapper_wide2">
                    <a href="{{ url("client/products/{$product['id']}/detail") }}">
                        <img loading="lazy" src="{{ asset($product['img_thumbnail']) }}" width="252" height="229"
                            alt="" class="pc__img">
                    </a>
                </div><!-- /.pc__img-wrapper -->

                <div class="pc__info position-relative">
                    <p class="pc__category">{{ $product['c_name'] }}</p>
                    <h6 class="pc__title"><a href="product1_simple.html">{{ $product['name'] }}</a></h6>
                    <div class="product-card__review d-sm-flex align-items-center">
                        <div class="reviews-group d-flex">
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z">
                                </path>
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z">
                                </path>
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z">
                                </path>
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z">
                                </path>
                            </svg>
                            <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.0172 0.313075L2.91869 2.64013L0.460942 3.0145C0.0201949 3.08129 -0.15644 3.64899 0.163185 3.97415L1.94131 5.78447L1.52075 8.34177C1.44505 8.80402 1.91103 9.15026 2.30131 8.93408L4.5 7.72661L6.69869 8.93408C7.08897 9.14851 7.55495 8.80402 7.47925 8.34177L7.05869 5.78447L8.83682 3.97415C9.15644 3.64899 8.97981 3.08129 8.53906 3.0145L6.08131 2.64013L4.9828 0.313075C4.78598 -0.101718 4.2157 -0.10699 4.0172 0.313075Z">
                                </path>
                            </svg>
                        </div>
                        <span class="reviews-note text-lowercase text-secondary ms-sm-1">321,975</span>
                    </div>

                    <div class="product-card__price d-flex mb-2">
                        <span class="money price fs-5">$35.90</span>
                    </div>

                    <div class="product-card__countdown">
                        <div class="text-secondary d-flex align-items-center gap-1 mb-1">
                            <span>Ends in</span>
                            <div class="position-relative d-flex align-items-center text-center color-secondary js-countdown"
                                data-date="18-5-2024" data-time="06:50">
                                <div class="day countdown-unit">
                                    <span class="countdown-num d-block"></span>
                                </div>
                                <span>d&nbsp;</span>
                                <div class="hour countdown-unit">
                                    <span class="countdown-num d-block"></span>
                                </div>
                                <span>:</span>
                                <div class="min countdown-unit">
                                    <span class="countdown-num d-block"></span>
                                </div>
                                <span>:</span>
                                <div class="sec countdown-unit">
                                    <span class="countdown-num d-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="progress progress_uomo progress_uomo_small mb-2">
                            <div class="progress-bar theme-bg-color-secondary" role="progressbar" style="width: 40%;"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="text-secondary d-flex align-items-center justify-content-between gap-2">
                            <div>Available: <span class="text-primary">6</span></div>
                            <div>Already Sold: <span class="text-primary">28</span></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    {{-- <td>{{ $product['id'] }}</td>
        <td>
            <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
        </td>
        <td>{{ $product['name'] }}</td>
        <td>{{ $product['c_name'] }}</td>
        <td>{{ $product['created_at'] }}</td>
        <td>{{ $product['updated_at'] }}</td> --}}
@endsection
