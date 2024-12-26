import Shepherd from 'https://cdn.jsdelivr.net/npm/shepherd.js@13.0.0/dist/esm/shepherd.mjs';

            document.addEventListener('DOMContentLoaded', async () => {
                const tourSteps = {
                    '/dashboard': {
                        steps: [{
                                id: 'welcome',
                                title: 'Welcome to Adcrea8!',
                                text: '🎉 Where creativity meets earnings! Dive into exciting jobs, complete tasks, and start earning today!',
                                attachTo: null, // No attachment, center of screen
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next'
                                }],
                            },
                            {
                                id: 'tour-start',
                                title: 'Getting Started',
                                text: 'Feeling overwhelmed? Don’t worry! Let us show you around so you feel right at home.',
                                attachTo: null,
                                classes: 'highlight-step',
                                buttons: [{
                                        text: "Nah, I'm good",
                                        action: 'cancel',
                                        secondary: true,
                                        classes: "btn-light-danger"
                                    }, {
                                        text: 'Begin Tour',
                                        action: 'next'
                                    },

                                ],
                            },
                            {
                                id: 'metrics-creator',
                                title: 'Your Metrics',
                                text: '💡 Here’s where you’ll find your metrics—they grow as you complete tasks. Exciting, right?',
                                attachTo: {
                                    element: '.stats-card',
                                    on: 'bottom'
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next'
                                }],
                            },
                            {
                                id: 'role-display',
                                title: 'Current Role',
                                text: '👔 Your current role appears here. Curious to switch? Let’s move on.',
                                attachTo: {
                                    element: '.current-role',
                                    on: 'bottom'
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next'
                                }],
                            },
                            {
                                toggleElements: ['.burger-icon'], // Elements to simulate clicks
                                canClickTarget: false,
                                id: 'role-switch',
                                title: 'Switch Roles',
                                text: '🔄 Ready to switch roles? Click here to toggle between Creator and Brand.',
                                attachTo: {
                                    element: '.role-switch',
                                    on: 'bottom'
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next'
                                }],
                            },
                            {
                                toggleElements: ['.user-profile-icon'], // Elements to simulate clicks
                                canClickTarget: false,
                                id: 'show-notifications',
                                title: 'Notifications',
                                text: '📬 Notifications, logs, and updates live here. Be sure to check them often!',
                                attachTo: {
                                    element: '.notifications-show',
                                    on: 'bottom'
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next'
                                }],
                            },
                            {
                                canClickTarget: false,
                                id: 'manually-tour',
                                title: 'End of Tour',
                                text: 'That’s all for this page! Need a refresher? Click the "?" below anytime.',
                                attachTo: {
                                    element: '#start-tour',
                                    on: 'top'
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }],
                            },
                            {
                                id: 'Go-to-Account',
                                title: 'Edit your Profile',
                                text: "with that said, let's head over to your account page and tweak some settings",
                                attachTo: null,
                                classes: 'highlight-step',
                                buttons: [{
                                    text: "later",
                                    action: 'cancel'
                                }, {
                                    text: 'Go',
                                    action: 'navigate',
                                    navigateTo: "/user/me/profile/personal-info",
                                }],
                            },
                        ],
                    },

                    '/user/me/profile/personal-info': {
                        steps: [{
                                id: 'welcome',
                                title: 'Welcome',
                                text: 'Welcome to your account settings! This is your command center for managing all things about your account. Let\'s walk you through the essentials.',
                                attachTo: null, // No attachment, display in the center of the screen
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'account-role',
                                title: 'Account Role',
                                text: 'Right here, you can see your current account role—your badge of honor! It tells the world where you stand in our system. Ready to dive deeper into your profile?',
                                attachTo: {
                                    element: '.current-role',
                                    on: 'right',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                        text: 'Next',
                                        action: 'next',
                                    },
                                ],
                            },
                            {
                                id: 'profile-change',
                                title: 'Profile Picture',
                                text: 'They say a picture is worth a thousand words—why not let yours say "Hire me"? A stunning profile picture can catch the eye of brands looking for talent. Let\'s give them something to look at!',
                                attachTo: {
                                    element: '.changeAuthorPictureProfile',
                                    on: 'right',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'important-stats',
                                title: 'Important Metrics',
                                text: 'Numbers tell your story—this is where your key metrics live. Connecting new social accounts in the "Socials" tab could elevate your stats even further. Remember, these numbers are as visible as your smile in your new profile pic!',
                                attachTo: {
                                    element: '.account-metrics',
                                    on: 'bottom',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'profile-compleation',
                                title: 'Profile Completion',
                                text: 'See that bar? It\'s not just for decoration. Filling out your profile gets you closer to the 70% mark, the sweet spot brands look for. Let’s aim for the top!',
                                attachTo: {
                                    element: '.w-sm-300px',
                                    on: 'bottom',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'navigate-settings',
                                title: 'Navigation',
                                text: 'Exploring new opportunities starts with navigation—your handy guide to other settings categories. Don\'t stop at the profile; see what else you can customize!',
                                attachTo: {
                                    element: '.nav.nav-stretch',
                                    on: 'bottom',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'fillup-account-settings',
                                title: 'Fill Up Details',
                                text: 'Completing your account details is like building a masterpiece—every piece counts. ensure you have all the essential information brands need to choose you!',
                                attachTo: null, // No attachment, display in the center of the screen
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Next',
                                    action: 'next',
                                }, ],
                            },
                            {
                                id: 'manually-tour',
                                title: 'Restart the Tour',
                                text: 'That’s a wrap for this page! But remember, our guidance doesn’t stop here. As you explore other pages, we’ll be here to guide you. Need to revisit this tour? Click on the "?" icon below anytime.',
                                attachTo: {
                                    element: '#start-tour',
                                    on: 'top',
                                },
                                classes: 'highlight-step',
                                buttons: [{
                                    text: 'Finish',
                                    action: 'cancel',
                                }, ],
                            },
                        ],
                    },
                };

                const shepherd = new Shepherd.Tour({
                    useModalOverlay: true,
                    confirmCancel: true,
                    confirmCancelMessage: "incase you Need a refresher? Click the '?' below anytime. are you sure you want to cancel?",
                    defaultStepOptions: {
                        classes: 'shadow-md bg-purple-dark',
                        scrollTo: true,
                        showCancelLink: true,
                    },
                });


                // Function to start the tour dynamically based on the current page URL
                function startTour() {
                    const currentPath = window.location.pathname;
                    const stepsForPage = tourSteps[currentPath]?.steps;

                    if (!stepsForPage) {
                        console.warn('No tour steps defined for this page:', currentPath);
                        return;
                    }

                    shepherd.steps = []; // Clear existing steps
                    stepsForPage.forEach((step) => shepherd.addStep({...step,
                        beforeShowPromise: () => {
                            new Promise((resolve) => {
                                console.log("beforeShowPromise fired!!", step.id);

                                if (step.toggleElements) {
                                    // Check if the navigation menu is open and close it
                                    step.toggleElements.forEach((selector) => {
                                        const element = document.querySelector(
                                            selector);
                                        if (element) {
                                            // Simulate the click to close the nav
                                            element.click();
                                            return resolve();
                                        }
                                    });
                                }

                            })
                        },
                        when: {
                            hide: function() { // Custom logic before moving to the next step 
                                console.log("beforeHidePromise fired!!", step.id);

                                if (step.toggleElements) {
                                    // Check if the navigation menu is open and close it
                                    step.toggleElements.forEach((selector) => {
                                        const element = document.querySelector(
                                            selector);
                                        if (element) {
                                            // Simulate the click to close the nav
                                            element.click();
                                        }
                                    });
                                }

                            }
                        },
                        buttons: step.buttons.map(button => ({
                            text: button.text,
                            action: () => {
                                if (button.action === 'next') {
                                    shepherd
                                        .next(); // Ensure it calls the `next` method of Shepherd
                                }
                                if (button.action === 'navigate') {
                                    window.location.href = button.navigateTo;
                                }
                                if (button.action === 'cancel') {
                                    shepherd
                                        .cancel();
                                }
                            },
                        })),}
                    )); // Add steps for the current page
                    shepherd.start(); // Start the tour
                }

                // Add event listener for manual tour start
                document.querySelector('#start-tour').addEventListener('click', startTour);

                // Automatically start the tour if not already completed (check localStorage)
                if (!localStorage.getItem(`tourCompleted-${window.location.pathname}`)) {
                    shepherd.on('complete', () => {
                        localStorage.setItem(`tourCompleted-${window.location.pathname}`, true);
                    });
                    startTour();
                }

                // tourSteps['/dashboard'].steps.forEach((step) => {
                //     tour.addStep({
                //         ...step,
                //         beforeShowPromise: () => {
                //             new Promise((resolve) => {
                //                 console.log("beforeShowPromise fired!!", step.id);

                //                 if (step.toggleElements) {
                //                     // Check if the navigation menu is open and close it
                //                     step.toggleElements.forEach((selector) => {
                //                         const element = document.querySelector(
                //                             selector);
                //                         if (element) {
                //                             // Simulate the click to close the nav
                //                             element.click();
                //                             return resolve();
                //                         }
                //                     });
                //                 }

                //             })
                //         },
                //         when: {
                //             hide: function() { // Custom logic before moving to the next step 
                //                 console.log("beforeHidePromise fired!!", step.id);

                //                 if (step.toggleElements) {
                //                     // Check if the navigation menu is open and close it
                //                     step.toggleElements.forEach((selector) => {
                //                         const element = document.querySelector(
                //                             selector);
                //                         if (element) {
                //                             // Simulate the click to close the nav
                //                             element.click();
                //                         }
                //                     });
                //                 }

                //             }
                //         },
                //         buttons: step.buttons.map(button => ({
                //             text: button.text,
                //             action: () => {
                //                 if (button.action === 'next') {
                //                     tour
                //                         .next(); // Ensure it calls the `next` method of Shepherd
                //                 }
                //                 if (button.action === 'navigate') {
                //                     window.location.href = button.navigateTo;
                //                 }
                //                 if (button.action === 'cancel') {
                //                     tour
                //                         .cancel();
                //                 }
                //             },
                //         })),
                //     });
                // });

                // tour.on('complete', () => {
                //     localStorage.setItem("tourCompleted", true);
                // });

                // tour.on('cancel', () => {
                //     localStorage.setItem("tourCompleted", true);
                // });

                // if (!localStorage.getItem("tourCompleted")) {
                //     tour.start();
                // }

                // document.querySelector("#start-tour").addEventListener("click", () => {
                //     tour.start();

                // })

            });