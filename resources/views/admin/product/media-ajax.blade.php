<div class="gallery gallery-md">
    <img onclick="removeMedia('{{ $post->product_id }}', '{{ $post->image_1 }}', 'image_1')" class="gallery-item" src="{{ $post->image_1 }}" alt="">
    <img onclick="removeMedia('{{ $post->product_id }}', '{{ $post->image_2 }}', 'image_2')" class="gallery-item" src="{{ $post->image_2 }}" alt="">
    <img onclick="removeMedia('{{ $post->product_id }}', '{{ $post->image_3 }}', 'image_3')" class="gallery-item" src="{{ $post->image_3 }}" alt="">
    <img onclick="removeMedia('{{ $post->product_id }}', '{{ $post->image_4 }}', 'image_4')" class="gallery-item" src="{{ $post->image_4 }}" alt="">
    <img onclick="removeMedia('{{ $post->product_id }}', '{{ $post->image_5 }}', 'image_5')" class="gallery-item" src="{{ $post->image_5 }}" alt="">
    <div style="display:none" id="notif-remove-media">Removing. . .</div>
</div>