<style>
    div.fixed {
        position: fixed;
        bottom: 1vh;
        left: 2px;
        z-index: 6;
    }

    .img-contact {
        margin: 8px;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
    }

    .img-contact:hover {
        filter: contrast(200%);
        cursor: pointer;
        animation-name: bounce;
        -moz-animation-name: bounce;
    }


    @keyframes bounce {

        0%,
        100%,
        20%,
        50%,
        80% {
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }

        40% {
            -webkit-transform: translateY(-20px);
            -ms-transform: translateY(-20px);
            transform: translateY(-20px);
        }

        60% {
            -webkit-transform: translateY(-10px);
            -ms-transform: translateY(-10px);
            transform: translateY(-10px);
        }
    }
</style>

<div class="fixed">
    <div>
        <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=support@code-gurukul.com&tf=1" title="Reach out directly to the co-founders">
            <img class="img-contact" src="./images/gmail_icon.png" alt="" width="45px" srcset="" />
        </a>
    </div>

    <div>
        <a target="_blank" href="https://wa.me/919511841742" title="Reach out directly to the co-founders">
            <img class="img-contact" src="./images/whatsapp.png" alt="" width="43px" srcset="" />
        </a>
    </div>
</div>