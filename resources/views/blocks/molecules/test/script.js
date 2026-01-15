function videoPopup() {
    return {
        popup: false,
        
        open() {
            this.popup = true;
            
            // Start video når popup åbner
            this.$nextTick(() => {
                if (this.$refs.videoPlayer) {
                    this.$refs.videoPlayer.play();
                }
            });
        },
        
        close() {
            if (this.$refs.videoPlayer) {
                this.$refs.videoPlayer.pause();
            }
            this.popup = false;
        }
    }
}