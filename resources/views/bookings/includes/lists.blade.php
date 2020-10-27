<div class="col-md-12">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Event Name</th>
                <th scope="col">Event service</th>
                <th scope="col">Price</th>
                <th scope="col">Duration</th>
                <th scope="col">Book Now</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $service_event)
            <tr>
                <td>{{ $service_event->event_name ?? ''}}</td>
                <td>{{ $bookservice->name ?? '' }}</td>
                <td>{{ $service_event->price ?? ''}}</td>
                <td>{{ $service_event->duration ?? ''}}</td>
                <td>
                    <a class="btn btn-primary" 
                    href="{{ route('event.create', ['bookservice' =>$service_event->bookingService->name, 'bookevent'=>$service_event->id]) }}">
                    BookNow
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No Data available</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
