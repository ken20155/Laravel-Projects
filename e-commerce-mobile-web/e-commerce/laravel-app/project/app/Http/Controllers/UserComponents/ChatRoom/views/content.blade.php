<div class="content-header bg-light p-3 text-center">
    <div class="d-flex justify-content-around">
        <div class="input-group search-top">
           <h3 class=""><a href="chat-list"><i class="bi bi-arrow-left-circle"></i></a> Juan Dela Cruz</h3>
        </div>

    </div>
</div>
<style>
    .chat-container {
        height: 90vh;
        border: 1px solid #ccc;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
    .chat-header {
        background-color: #99aec2;
        color: white;
        padding: 10px;
        text-align: center;
    }
    .chat-body {
        flex-grow: 1;
        overflow-y: auto;
        padding: 15px;
        background-color: #3CB815;
    }
    .message {
        margin-bottom: 15px;
    }
    .message.sent {
        text-align: right;
   
    }
    .message.sent .message-text {
        background-color: #e9ecef;
    }
    .message.received .message-text {
        background-color: #e9ecef;
    }
    .message-text {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 70%;
    }
    .chat-footer {
        padding: 10px;
        background-color: #fff;
        border-top: 1px solid #ccc;
    }
</style>
<!-- Product Start -->
<div class="container-custom">

    <div class="containers">
        <div class="row justify-content-center">
            <div class="col-12 chat-container">
                <!-- Chat Header -->
                <!-- <div class="chat-header">
                    <h5>Chat Room</h5>
                </div> -->
                <!-- Chat Body -->
                <div class="chat-body">
                    <div class="message received">
                        <div class="message-text">Hello! How can I help you today?</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Hi! I have a question about your services.</div>
                    </div>
                    <div class="message received">
                        <div class="message-text">Sure, feel free to ask.</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Can you provide more details about your pricing?</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Can you provide more details about your pricing?</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Can you provide more details about your pricing?</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Can you provide more details about your pricing?</div>
                    </div>
                    <div class="message sent">
                        <div class="message-text">Can you provide more details about your pricing?</div>
                    </div>
                    <!-- Add more messages here to test scrolling -->
                </div>
                <!-- Chat Footer -->
                <div class="chat-footer">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type a message...">
                        <button class="btn btn-primary" type="button">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>