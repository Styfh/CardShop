<a href="/listing/{{$listing->id}}" style="text-decoration: none; color: black;">
    <div class="card" style="width: 12rem; height: 25rem">
        <img src="{{ asset("storage/listing_pics/$listing->lister_id/$listing->image") }}" class="card-img-top" style="height: 16rem; width: 100%;">
        <div class="card-body">
          <h5 class="card-title overflow-hidden" style="height: 50px">{{ $listing->name }}</h5>
          <p class="card-text">{{ $listing->series->name }}</p>
          <p class="card-text">Rp. {{ $listing->individual_price }}</p>
        </div>
    </div>
</a>
