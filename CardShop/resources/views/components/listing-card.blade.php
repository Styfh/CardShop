<a href="" style="text-decoration: none; color: black;">
    <div class="card" style="width: 12rem;">
        <img src="{{ asset("storage/$listing->image") }}" class="card-img-top" style="height: 12rem; width: 100%;">
        <div class="card-body">
          <h5 class="card-title">{{ $listing->name }}</h5>
          <p class="card-text">{{ $listing->series->name }}</p>
          <p class="card-text">Rp. {{ $listing->individual_price }}</p>
        </div>
    </div>
</a>
