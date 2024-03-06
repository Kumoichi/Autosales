@extends('layout.app')

@section('content')
<div class="centralize">
    <h2>Select Date</h2>
    <form action="{{ route('save.date') }}" method="post">
    @csrf
    <input type="text" id="selected_date" name="selected_date">
    <input type="hidden" id="selected_date_with_day" name="selected_date_with_day">
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

    function formatDateWithDay(date) {
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('ja-JP', options);
    }
</script>
@endpush
