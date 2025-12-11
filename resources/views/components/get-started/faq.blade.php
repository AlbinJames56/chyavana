<section class="py-20 bg-[var(--neutral-light)] relative">
    <div class="container mx-auto px-4 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl lg:text-4xl font-semibold text-[var(--neutral-dark)]">
                Common Questions
            </h2>
            <p class="mt-2 text-[var(--muted-foreground)]">
                Find quick answers to the most asked questions.
            </p>
        </div>

        <div class="max-w-3xl mx-auto space-y-3">

            @foreach([
                ['q'=>'How long is the initial consultation?','a'=>'It typically lasts 45–60 minutes so we can understand your complete health background and lifestyle.'],
                ['q'=>'Do you accept insurance?','a'=>'We provide detailed receipts that you can use for reimbursement depending on your insurance policy.'],
                ['q'=>'What should I bring?','a'=>'Recent medical reports, current medications, and any relevant lifestyle information help us build the right plan.'],
                ['q'=>'Can I continue medications?','a'=>'Yes. Ayurveda complements conventional medicine. Your practitioner will guide you safely.']
            ] as $index => $faq)

            <!-- Accordion -->
            <div class="border-[var(--border)] bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                <details class="group">
                    <summary 
                        class="flex justify-between items-center cursor-pointer p-6 text-lg text-[var(--neutral-dark)] font-medium">
                        
                        {{ $faq['q'] }}

                        <!-- Icon -->
                        <span class="transition-transform duration-300 group-open:rotate-180">
                            ▼
                        </span>
                    </summary>

                    <div class="px-6 pb-6 text-[var(--muted-foreground)] leading-relaxed">
                        {{ $faq['a'] }}
                    </div>
                </details>
            </div>

            @endforeach

        </div>
    </div>
</section>
