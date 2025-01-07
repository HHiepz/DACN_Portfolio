@extends('layout.layout')

{{-- Nội dung chính --}}
@section('content')
    @include('include.client._header')

    <main class="py-5 min-vh-100">
        <div class="container">
            <section>
                <div class="section__banner-text">
                    <p class="section__banner-text--title">Sản phẩm</p>
                    <p class="section__banner-text--text">
                        Các dự án tôi đã làm trong những năm tôi học lập trình
                    </p>
                </div>
            </section>

            <section>
                @if ($technologies->count() > 0)
                    <div class="section__card--fillter">
                        <div class="btn-group">
                            @foreach ($technologies as $technology)
                                <a href="{{ route('product.search.technology', $technology->id) }}"
                                    class="btn btn-sm btn-outline-primary">{{ $technology->name }}</a>
                                {{-- <button type="button" class="btn btn-outline-primary">{{ $technology->name }}</button> --}}
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="row g-5 g-md-4">
                    @foreach ($products as $product)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="section__card">
                                <a href="{{ route('product.detail', $product->id) }}">
                                    @if (empty($product->image_url))
                                        <img class="card-img-top rounded" src="https://placehold.co/400x200"
                                            alt="Title" />
                                    @else
                                        <img class="card-img-top rounded"
                                            src="{{ asset('storage/' . $product->image_url) }}" alt="Title" />
                                    @endif
                                </a>
                                <p class="section__card--type">
                                    <span>{{ $product->type }}</span>
                                    ・
                                    <span>
                                        @if ($product->project_started_at && $product->project_ended_at)
                                            {{ $product->project_started_at->format('d/m/Y') }}
                                            -
                                            {{ $product->project_ended_at->format('d/m/Y') }}
                                        @elseif ($product->project_started_at)
                                            {{ $product->project_started_at->format('d/m/Y') }}
                                        @elseif ($product->project_ended_at)
                                            {{ $product->project_ended_at->format('d/m/Y') }}
                                        @endif
                                    </span>
                                </p>
                                <h4 class="section__card--title">
                                    <a href="{{ route('product.detail', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                <p class="section__card--text">
                                    {{ $product->short_description }}
                                </p>
                                <div class="section__card--tags">
                                    @foreach ($product->technologies as $technology)
                                        <span class="badge badge-outline-dark">{{ $technology->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

    @include('include.client._footer')
@endsection
