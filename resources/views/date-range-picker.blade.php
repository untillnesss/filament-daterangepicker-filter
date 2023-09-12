@php
    $name = uniqid();
    
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div wire:ignore>
        <div
            x-ref="container"
            x-data="dateRangeComponent({
                state: @entangle($statePath),
                name: @js($name),
                alwaysShowCalendars: @js($isAlwaysShowCalender()),
                autoApply: @js($getAutoApplyOption()),
                linkedCalendars: @js($getLinkedCalendarsOption()),
                autoUpdateInput: false,
                startDate: @js($getStartDate()),
                endDate: @js($getEndDate()),
                maxDate: @js($getMaxDate()),
                minDate: @js($getMinDate()),
                timePicker: @js($getTimePickerOption()),
                timePickerIncrement: @js($getTimePickerIncrementOption()),
                displayFormat: @js($getDisplayFormat()),
                applyLabel: '{!! __('filament-daterangepicker-filter::message.apply') !!}',
                cancelLabel: '{!! __('filament-daterangepicker-filter::message.cancel') !!}',
                fromLabel: '{!! __('filament-daterangepicker-filter::message.from') !!}',
                toLabel: '{!! __('filament-daterangepicker-filter::message.to') !!}',
                customRangeLabel: '{!! __('filament-daterangepicker-filter::message.custom') !!}',
                january: '{!! __('filament-daterangepicker-filter::message.january') !!}',
                february: '{!! __('filament-daterangepicker-filter::message.february') !!}',
                march: '{!! __('filament-daterangepicker-filter::message.march') !!}',
                april: '{!! __('filament-daterangepicker-filter::message.april') !!}',
                may: '{!! __('filament-daterangepicker-filter::message.may') !!}',
                june: '{!! __('filament-daterangepicker-filter::message.june') !!}',
                july: '{!! __('filament-daterangepicker-filter::message.july') !!}',
                august: '{!! __('filament-daterangepicker-filter::message.august') !!}',
                september: '{!! __('filament-daterangepicker-filter::message.september') !!}',
                october: '{!! __('filament-daterangepicker-filter::message.october') !!}',
                november: '{!! __('filament-daterangepicker-filter::message.november') !!}',
                december: '{!! __('filament-daterangepicker-filter::message.december') !!}',
                sunday: '{!! __('filament-daterangepicker-filter::message.su') !!}',
                monday: '{!! __('filament-daterangepicker-filter::message.mo') !!}',
                tuesday: '{!! __('filament-daterangepicker-filter::message.tu') !!}',
                wednesday: '{!! __('filament-daterangepicker-filter::message.we') !!}',
                thursday: '{!! __('filament-daterangepicker-filter::message.th') !!}',
                friday: '{!! __('filament-daterangepicker-filter::message.fr') !!}',
                saturday: '{!! __('filament-daterangepicker-filter::message.sa') !!}',
                firstDay: @js($getFirstDayOfWeek()),
                today: '{!! __('filament-daterangepicker-filter::message.today') !!}',
                yesterday: '{!! __('filament-daterangepicker-filter::message.yesterday') !!}',
                last_7_days: '{!! __('filament-daterangepicker-filter::message.last_7_days') !!}',
                last_30_days: '{!! __('filament-daterangepicker-filter::message.last_30_days') !!}',
                this_month: '{!! __('filament-daterangepicker-filter::message.this_month') !!}',
                last_month: '{!! __('filament-daterangepicker-filter::message.last_month') !!}',
                this_year: '{!! __('filament-daterangepicker-filter::message.this_year') !!}',
                last_year: '{!! __('filament-daterangepicker-filter::message.last_year') !!}',
                handleValueChangeUsing: (value, name) => {
                    if (name == '{{ $name }}') {
                        @this.set('{!! $statePath !!}', value);
                    }
                },
            })"
            id="date-range-picker-{{ $name }}"
            wire:key="date-range-picker-{{ $name }}"
            x-on:keydown.esc="isOpen() && $event.stopPropagation()"
            {{ $attributes->merge($getExtraAttributes())->class(['filament-forms-date-time-picker-component relative']) }}
            {{ $getExtraAlpineAttributeBag() }}
        >
            <x-filament::input.wrapper
                :disabled="$isDisabled"
                :inline-prefix="$isPrefixInline"
                :inline-suffix="$isSuffixInline"
                :prefix="$prefixLabel"
                :prefix-actions="$prefixActions"
                :prefix-icon="$prefixIcon"
                :suffix="$suffixLabel"
                :suffix-actions="$suffixActions"
                :suffix-icon="$suffixIcon"
                :valid="!$errors->has($statePath)"
                class="fi-fo-text-input"
                :attributes="\Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())->class([
                    'overflow-hidden',
                ])"
            >
                <button
                    x-ref="button"
                    aria-label="{{ $getPlaceholder() }}"
                    dusk="filament.forms.{{ $statePath }}.open"
                    type="button"
                    tabindex="-1"
                    class="w-full"
                >
                    <div
                        class="relative inline-block w-full bg-white dark:bg-white/5"
                        id="{{ $name }}.container"
                        wire:key="{{ $name }}.container"
                    >
                        <x-filament::input
                            :valid="! $errors->has($name)"
                            x-ref="daterange"
                            wire:key="{{ $this->id() }}.{{ $statePath }}.{{ $field::class }}.display-text"
                            :attributes="\Filament\Support\prepare_inherited_attributes(
                                $getExtraInputAttributeBag(),
                            )->merge(
                                [
                                    'id' => $getId(),
                                    'name' => $name,
                                    'disabled' => $isDisabled(),
                                    'placeholder' => $getPlaceholder(),
                                    'required' => $isRequired(),
                                    'readonly' => true,
                                    'type' => 'text',
                                ],
                                escape: false,
                            )"
                        />
                    </div>
                </button>
            </x-filament::input.wrapper>
        </div>
    </div>
</x-dynamic-component>
