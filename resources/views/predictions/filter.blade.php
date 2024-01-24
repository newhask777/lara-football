<div class="cart_header p-4 rounded-t-md border-b-2 flex justify-between">
    <div class="">
        <ul class="flex mt-auto mb-auto text-sm font-bold">

            <form action="{{route('predictions.filter.date', ['date' => $date])}}" method="GET">
                @csrf

                <div class="flex">
                    <div class="border">
                        <select name="date" id="" class="ml-2">

                            <option value="{{request()->date}}"  selected>{{request()->date}}</option>

                            @foreach($dates as $d)
                                <option value="{{$d->date}}">{{$d->date}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="border ml-2">
                        <select name="status" id="status" class="ml-2">
                            <option value="{{request()->status}}" >{{request()->status}}</option>
                            <option value="won">won</option>
                            <option value="lost">lost</option>
                            <option value="postponed">postponed</option>
                        </select>
                    </div>
                    <div class="ml-2">
                        <button type="submit">Search</button>
                    </div>
                </div>

            </form>


        </ul>
    </div>
</div>
