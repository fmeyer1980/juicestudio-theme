<div x-data="videoPopup()">
    <button 
        type="button"
        class="bg-primary" 
        @click="open()"
    >
        Open Video
    </button>
    @if($is_preview == false)
    <div 
        x-show="popup" 
        @click.outside="close()"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
    >
        <div class="relative bg-white p-8 rounded-lg max-w-4xl w-full" @click.stop>
            <button 
                type="button"
                x-ref="popupCloseButton" 
                @click="close()"
                class="absolute top-4 right-4 text-2xl"
            >
                ×
            </button>
            
            
            <video 
                x-ref="videoPlayer" 
                src="http://localhost:10144/wp-content/uploads/2026/01/Ventipartner-Andi-fortaeller-4.mp4"
                loop
                preload="auto"
                playsinline
                controls
                class="w-full"
            ></video>
            
        </div>
    </div>
    @endif
</div>