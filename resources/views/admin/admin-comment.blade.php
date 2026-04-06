@extends('admin.layouts.main')
@section('main')
<style>
    .comment-box {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        font-family: Arial, sans-serif;
    }

    .comment-box h3 {
        margin-bottom: 15px;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.2);
    }

    .btn-submit {
        width: 100%;
        padding: 10px;
        border: none;
        background: #007bff;
        color: #fff;
        font-size: 15px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background: #0056b3;
    }
</style>

<div class="comment-box">
    <h3>Leave a Comment</h3>

    <form id="commentForm">
        @csrf
        <input type="hidden" name="post_id" value="">

        <div class="form-group">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>

        <div class="form-group">
            <label>Your Comment</label>
            <textarea name="comment" class="form-control" rows="4" placeholder="Write your comment..." required></textarea>
        </div>

        <button type="submit" class="btn-submit">Post Comment</button>
    </form>
</div>
@endsection