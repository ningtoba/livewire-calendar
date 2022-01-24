
<div
    ondragenter="onLivewireCalendarEventDragEnter(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragleave="onLivewireCalendarEventDragLeave(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
    ondragover="onLivewireCalendarEventDragOver(event);"
    ondrop="onLivewireCalendarEventDrop(event, '{{ $componentId }}', '{{ $day }}', {{ $day->year }}, {{ $day->month }}, {{ $day->day }}, '{{ $dragAndDropClasses }}');"
    style="min-width: 10rem; flex: 1 1 0%; height:10rem; @media (min-width: 1024px) {height: 12rem;} margin-top: -1px; 
margin-left: -1px; 
border-width: 1px; 
border-color: #E5E7EB; 
">

    {{-- Wrapper for Drag and Drop --}}
    <div
        style="width: 100%; 
height: 100%; "
        id="{{ $componentId }}-{{ $day }}">

        <div
            @if($dayClickEnabled)
                wire:click="onDayClick({{ $day->year }}, {{ $day->month }}, {{ $day->day }})"
            @endif
            style="width: 100%; 
height: 100%; padding: 0.5rem; display: flex; 
display: flex; 
flex-direction: column; {{ $dayInMonth ? $isToday ? 'background-color: #FEF3C7; ' : ' background-color: #ffffff; 
 ' : 'background-color: #F3F4F6; ' }}">

            {{-- Number of Day --}}
            <div style="display: flex; 
display: flex; 
align-items: center; ">
                <p style="{{ $dayInMonth ? 'font-weight: 500; 
' : '' }}">
                    {{ $day->format('j') }}
                </p>
                <p style="margin-left: 1rem; 
color: #4B5563; 
font-size: 0.75rem;
line-height: 1rem; 
;">
                    @if($events->isNotEmpty())
                        {{ $events->count() }} {{ Str::plural('event', $events->count()) }}
                    @endif
                </p>
            </div>

            {{-- Events --}}
            <div style="padding: 0.5rem; margin-top:0.5rem; margin-bottom: 0.5rem; flex: 1 1 0%; overflow-y:auto;">
                <div style="display: grid; grid-template-columns: repeat(1, minmax(0, 1fr)); grid-auto-flow: row; gap:0.5rem;">
                    @foreach($events as $event)
                        <div
                            @if($dragAndDropEnabled)
                                draggable="true"
                            @endif
                            ondragstart="onLivewireCalendarEventDragStart(event, '{{ $event['id'] }}')">
                            @include($eventView, [
                                'event' => $event,
                            ])
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
