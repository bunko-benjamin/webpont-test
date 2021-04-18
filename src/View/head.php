<style>
    h3, .container {
        width: 800px;
        margin: 0 auto;
        font-size: 24px;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    h3 {
        text-align: center;
    }

    .grid {
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    .grid::after {
        content: "";
        display: block;
        clear: both;
    }

    .grid-item {
        width: 21.833%;
        padding-bottom: 21.833%;
        overflow: hidden;
        float: left;
        background: #BBB;
        transform: rotate(45deg);
        margin: 5.5%;
        margin-top: -11%;
    }

    .grid-item:nth-child(1),
    .grid-item:nth-child(2),
    .grid-item:nth-child(3) {
        margin-top: 5%;
    }

    .grid-item:nth-child(5n+4) {
        margin-left: 21.9%;
    }

    .grid-item:nth-child(5n+6) {
        clear:left;
    }

    .grid-item:nth-child(5n+6):last-of-type {
        margin-left: 38.25%;
    }
    .grid-inner {
        box-sizing: border-box;
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
        transform: rotate(-45deg);
        text-align: center;
        padding-top: 40%;
        font-size: 2em;
    }

    .button {
        text-align: center;
        padding-top: 15px;
    }

    button {
        border: none;
        background: #cccccc;
        border-radius: 5px;
        padding: 10px;
    }
</style>