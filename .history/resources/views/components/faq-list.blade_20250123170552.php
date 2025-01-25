<div class="container py-10 w-full max-w-3xl px-4 sm:px-6 lg:px-8 bg-colorNetral rounded-xl">
    <div class="text-center mb-10 text-colorOne">
        <p class="font-medium text-lg">FAQ</p>
        <h1 class="text-3xl sm:text-4xl lg:text-[50px] font-bold">
            Your Questions, Answered
        </h1>
    </div>

    <div class="space-y-4 py-4">
        @foreach($faqs as $faq)
        <div class="accordion-item shadow">
            <h2 class="accordion-header">
                <button 
                    class="accordion-button text-left w-full py-4 px-5 rounded-lg flex justify-between items-center"
                    onclick="toggleAccordion('collapse{{ $faq->id }}')">
                    <span class="flex-1 text-left">{{ $faq->question }}</span>
                    <svg id="arrow{{ $faq->id }}" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform transform rotate-0" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                <div class="accordion-body py-4 px-5 text-base rounded-b-lg">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function toggleAccordion(id) {
        let content = document.getElementById(id);
        let arrow = document.getElementById("arrow" + id.replace("collapse", ""));
        
        if (content.classList.contains("max-h-0")) {
            content.classList.remove("max-h-0");
            content.classList.add("max-h-96");
            arrow.classList.add("rotate-180");
        } else {
            content.classList.add("max-h-0");
            content.classList.remove("max-h-96");
            arrow.classList.remove("rotate-180");
        }
    }
</script>