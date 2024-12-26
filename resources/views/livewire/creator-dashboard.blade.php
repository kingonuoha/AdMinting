<div>
    <x-engage-hero />


    <div class="row mt-n30">

        @foreach ($stats as $stat)
            <x-stat-card :stat="$stat" />
        @endforeach
        <x-engage-join_premium />
    </div>

    @push('script')
        {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
        {{-- <script  type="module">
              import Shepherd from 'https://cdn.jsdelivr.net/npm/shepherd.js@13.0.0/dist/esm/shepherd.mjs';

            document.addEventListener('DOMContentLoaded', () => {
                const tour = new Shepherd.Tour({
                    useModalOverlay: true,
                    defaultStepOptions: {
                        classes: 'shadow-md bg-purple-dark',
                        scrollTo: true
                    }
                });

                tour.addStep({
                    id: 'example-step',
                    text: 'This step is attached to the bottom of the <code>.example-css-selector</code> element.',
                    attachTo: {
                        element: '.header-menu',
                        on: 'bottom'
                    },
                    classes: 'example-step-extra-class',
                    buttons: [{
                        text: 'Next',
                        action: tour.next
                    }]
                });
                tour.start();
            });
        </script> --}}

        <script type="module" src="{{asset('users/assets/js/custom/shepherdjs-tour.js')}}"> </script>
    @endpush

</div>
