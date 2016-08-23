<select name="year">
      @for ($year = date('Y'); $year > date('Y') - 100; $year--)
      <option value="{{$year}}">
              {{$year}}
      </option>
      @endfor
</select>
<select name="month">
      @foreach(range(1,12) as $month)

              <option value="{{$month}}">
                      {{date("M", strtotime('2016-'.$month))}}
              </option>
      @endforeach
</select>
<select name="day">
      @foreach(range(1,31) as $day)
              <option value="{{strlen($day)==1 ? '0'.$day : $day}}">
                      {{strlen($day)==1 ? '0'.$day : $day}}
              </option>
      @endforeach
</select>
