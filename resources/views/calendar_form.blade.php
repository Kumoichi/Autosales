@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="{{ asset('css/calendar_form.css') }}" rel="stylesheet">


<div class="centralize">
<form action="{{ route('save.date') }}" method="post">
    @csrf
    <div>
        <i class="fa-solid fa-calendar-days" style="font-size: 34px; color: gray;"></i>
        <input type="text" id="selected_date" name="selected_date" class="styled-input">
        <input type="hidden" id="selected_date_with_day" name="selected_date_with_day">
    </div>

    <div style="margin-top: 20px;">
        <i class="fa-solid fa-clock" style="margin-right: 16px; font-size: 34px; color: gray;"></i>
        <input type="text" id="selected_time" name="selected_time" class="styled-input">
    </div>

    <div style="margin-top: 20px;">
        <span class="material-symbols-outlined" style="margin-right: 16px; font-size: 34px; color: gray;">tactic</span>            
        <select name="selected_frequency" id="selected_frequency" class="styled-input" style="height: 30px; width: 167px;">
            <option value="spot_delivery">スポット配信</option>
            <option value="定期配信 - ３日ごと">定期配信 - ３日ごと</option>
            <option value="定期配信 - 毎週">定期配信 - 毎週</option>
            <option value="定期配信 - 隔週">定期配信 - 隔週</option>
            <option value="定期配信 - 毎月">定期配信 - 毎月</option>
        </select>
    </div>


    <button type="submit">Submit</button>
</form>

</div>

@endsection

@push('scripts')
<script>
    //カレンダーを日本語への変更
    flatpickr.l10ns.ja = {
        weekdays: {
            shorthand: ['日', '月', '火', '水', '木', '金', '土'],
            longhand: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日']
        },
        months: {
            shorthand: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            longhand: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
        },
        rangeSeparator: ' から ',
        weekAbbreviation: '週',
        scrollTitle: 'スクロールして時刻を増減',
        toggleTitle: 'クリックして切替え',
        amPM: ['午前', '午後'],
        yearAriaLabel: '年',
        time_24hr: true
    };

    flatpickr.localize(flatpickr.l10ns.ja);

    flatpickr("#selected_date", {
        enableTime: false,
        dateFormat: "Y-m-d",
        
        onChange: function(selectedDates, dateStr, instance) {
            var selectedDate = selectedDates[0];
            var formattedDateWithDay = formatDateWithDay(selectedDate);
            document.getElementById('selected_date').value = formattedDateWithDay;
            document.getElementById('selected_date_with_day').value = formattedDateWithDay;
        }
    });
    flatpickr("#selected_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i", 
        time_24hr: true
    });

    function formatDateWithDay(date) {
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('ja-JP', options);
    }
</script>
@endpush
