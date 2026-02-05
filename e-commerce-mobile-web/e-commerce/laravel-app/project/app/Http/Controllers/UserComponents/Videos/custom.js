$(document).ready(function() {
    const $video = $('#myVideo');
    const $playPauseBtn = $('#playPauseBtn');
    const $customControls = $('.custom-controls');
    const $videoContainer = $('#vid-play-pause');
    const $previousBtn = $('#previousBtn');
    const $nextBtn = $('#nextBtn');
    const $followBtn = $('#followBtn');
    const $likeBtn = $('#likeBtn');
    const $commentBtn = $('#commentBtn');
    const $shareBtn = $('#shareBtn');

    // Toggle play and pause
    function togglePlayPause() {
        if ($video[0].paused) {
            $video[0].play();
            $playPauseBtn.html('<i class="bi bi-pause-circle"></i>');
        } else {
            $video[0].pause();
            $playPauseBtn.html('<i class="bi bi-play-circle"></i>');
        }
        // Reset fade-out timer on interaction
        $customControls.removeClass('fade-out');
        setTimeout(function() {
            $customControls.addClass('fade-out');
        }, 2000);
    }

    // Handle screen tap or click on the video container
    $videoContainer.on('click', togglePlayPause);


    // Update button text based on video state
    $video.on('play', function() {
        $playPauseBtn.html('<i class="bi bi-pause-circle"></i>');
    });

    $video.on('pause', function() {
        $playPauseBtn.html('<i class="bi bi-play-circle"></i>');
    });
         //btn custom

        $previousBtn.on('click', function() {
            alert('Previous button clicked'); // Placeholder action for "Previous" button
            // Implement functionality to move to the previous video or action here
        });

        $nextBtn.on('click', function() {
            alert('Next button clicked'); // Placeholder action for "Next" button
            // Implement functionality to move to the next video or action here
        });

        $followBtn.on('click', function() {
            alert('Follow button clicked'); // Placeholder action for "Follow" button
            // Implement functionality to follow the user or channel here
        });

        $likeBtn.on('click', function() {
            alert('Like button clicked'); // Placeholder action for "Like" button
            // Implement functionality to like the video here
        });

        $commentBtn.on('click', function() {
            alert('Comment button clicked'); // Placeholder action for "Comment" button
            // Implement functionality to open comment section here
        });

        $shareBtn.on('click', function() {
            alert('Share button clicked'); // Placeholder action for "Share" button
            // Implement functionality to share the video here
        });
                
});