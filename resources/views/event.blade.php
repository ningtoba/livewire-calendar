<div
    @if($eventClickEnabled)
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    style="padding-top: 0.5rem;
padding-bottom: 0.5rem; 
padding-left: 0.75rem;
padding-right: 0.75rem; 
background-color: #ffffff; 
border-radius: 0.5rem; 
border-width: 1px; 
cursor: pointer; 
box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); ">

    <p style="font-size: 0.875rem;
line-height: 1.25rem; 
font-weight: 500; 
">
        {{ $event['title'] }}
    </p>
    <p style="margin-top: 0.5rem; 
font-size: 0.75rem;
line-height: 1rem; 
">
        {{ $event['description'] ?? 'No description' }}
    </p>
</div>
