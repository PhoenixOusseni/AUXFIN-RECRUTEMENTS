<style>
    .custom-card {
        position: relative;
        border: none;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .custom-card img {
        width: 100%;
        height: auto;
        transition: transform 0.4s ease;
    }

    .custom-card:hover img {
        transform: scale(1.05);
    }

    .date-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgb(236, 122, 8) 100%;
        color: #fff;
        font-weight: bold;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .date-badge span {
        font-size: 12px;
        line-height: 1;
    }

    .category-badge {
        position: absolute;
        bottom: -20px;
        left: 15px;
        background: rgb(236, 122, 8) 100%;
        color: #fff;
        padding: 5px 15px;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: bold;
        transition: all 0.3s;
    }

    .custom-card:hover .category-badge {
        bottom: 15px;
    }

    .card-body {
        transition: all 0.3s;
    }

    .card-body p.more-text {
        display: none;
    }

    .custom-card:hover .card-body p.more-text {
        display: block;
    }
</style>
