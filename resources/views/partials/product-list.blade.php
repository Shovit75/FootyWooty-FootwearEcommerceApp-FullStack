<div class="row row-pb-md">
    @if ($filteredProducts->isEmpty())
        <div class="col-md-12 text-center">
            <div class="mt-5"></div>
            <p>No products found matching your criteria.</p>
        </div>
    @else
        @foreach($filteredProducts as $product)
        <div class="col-lg-4 mb-4 text-center">
            <div class="product-entry border">
                <a href="{{url('frontend/proddetail/'.$product->id)}}" class="prod-img">
                    <img src="/storage/{{ $product->image }}" width="100%" height="280px" alt="{{ $product->name }}">
                </a>
                <div class="desc">
                    <h2><a href="{{url('frontend/proddetail/'.$product->id)}}">{{ $product->name }}</a></h2>
                    <span class="price"> ₹ {{ $product->price }}</span>
                    <?php
                    // Assuming $product->color is a JSON string
                    $productColorsArray = json_decode($product->color);
                    if (!function_exists('generateColorCircles')) {
                    // Function to generate HTML for circles based on colors
                    function generateColorCircles($colors) {
                        $html = '<span>Colors Available:</span><div class="py-2 d-flex">
                        <div class="container text-center"><div class="row justify-content-center">';
                        foreach ($colors as $color) {
                            $html .= '<span class="circle border border-secondary custom-' . strtolower($color) . ' mr-3"></span>';
                        }
                        $html .= '</div></div></div>';
                        return $html;
                        }
                    }
                    // Usage example
                    echo generateColorCircles($productColorsArray);
                    ?>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
