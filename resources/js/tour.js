class TourManager {
    constructor() {
        this.tour = null;
    }

    startTour(steps, options = {}) {
        // Destroy any existing tour
        if (this.tour) {
            this.tour.complete();
            this.tour = null;
        }

        // Initialize a new Shepherd tour
        this.tour = new Shepherd.Tour({
            defaultStepOptions: {
                classes: 'shepherd-theme-arrows',
                scrollTo: true,
                cancelIcon: {
                    enabled: true,
                },
            },
            ...options,
        });

        // Add steps dynamically
        steps.forEach((step) => {
            this.tour.addStep(step);
        });

        // Start the tour
        this.tour.start();
    }

    resumeTour(stepIndex = 0) {
        if (this.tour) {
            this.tour.show(stepIndex);
        }
    }
}

const TourInstance = new TourManager();
window.TourManager = TourInstance;
