<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset some basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #96EFFF;
            color: #333;
        }

        /* Styling for the video container */
        .video-container {
            max-width: 800px; /* Maximum width of the video */
            margin: 20px auto; /* Center the video horizontally */
            padding: 10px;
            background-color: #fff; /* White background for the video container */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Light shadow around the video */
        }

        iframe {
            width: 100%;
            height: 500px; /* Adjusted height to make the video taller */
            border-radius: 8px; /* Rounded corners for the iframe */
        }

        /* Styling for the comments section */
        .comments-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .comments-container h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .comment {
            margin-bottom: 15px;
            padding: 10px;
            background-color: #f9f9f9; /* Light background for each comment */
            border-radius: 8px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .comment strong {
            color: #007BFF; /* Blue color for username */
            font-weight: bold;
        }

        .comment p {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        /* Hover effect for comments */
        .comment:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        .comment-section {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-top: 30px;
    font-family: 'Arial', sans-serif;
}

.comment-title {
    font-size: 24px;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.comment-box {
    max-height: 400px;
    overflow-y: auto;
}

.comment-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.comment-item:hover {
    transform: translateY(-5px);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.comment-username {
    font-weight: bold;
    color: #007bff;
    font-size: 18px;
}

.comment-date {
    font-size: 14px;
    color: #777;
}

.comment-text {
    font-size: 16px;
    line-height: 1.5;
    color: #555;
}

.no-comments {
    text-align: center;
    font-size: 18px;
    color: #888;
    font-style: italic;
}

    </style>
</head>
<body>
    <div class="video-container">
        <?php if (!empty($konten->video)): ?>
            <iframe src="https://www.youtube.com/embed/<?= $konten->video ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <?php endif; ?>
    </div>

    <div class="comments-container">
    <section class="commentform-area   ">
        <div class="container">
            <form action="<?= base_url('home/komen')?>" method="post">
            <form action="your-action-url" method="post">
    <!-- Input hidden untuk ID Konten -->
    <input type="hidden" name="id_konten" value="<?= $konten->id_konten ?>">

    <div class="row flex-row d-flex">
        <div class="col-lg-6">
            <!-- Textarea untuk komentar -->
            <div class="form-group">
                <textarea class="form-control mb-4" name="isi_komen" placeholder="Tuliskan Komentar Anda" 
                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tuliskan Komentar Anda'" 
                          required=""></textarea>
            </div>

            <!-- Hidden input untuk ID -->
            <input type="hidden" name="id" value="<?= $this->uri->segment(3, 0) ?>">

            <!-- Input untuk username -->
            <div class="form-group">
                <input name="username" class="form-control mb-4" placeholder="Enter your username" 
                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your username'" 
                       required="" type="text">
            </div>

            <!-- Tombol submit -->
            <div class="form-group text-center">
                <input class="primary-btn mt-20" type="submit" value="Komen">
            </div>
        </div>
    </div>
</form>

<!-- Custom CSS -->
<style>
    /* Gaya umum untuk form */
    .form-group {
        margin-bottom: 20px;
    }

    /* Desain textarea */
    textarea.form-control {
        border-radius: 8px;
        padding: 15px;
        font-size: 16px;
        border: 1px solid #ddd;
        width: 100%;
        resize: vertical;
        box-sizing: border-box;
    }

    /* Desain input text */
    input.form-control {
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        width: 100%;
        box-sizing: border-box;
    }

    /* Tombol submit */
    .primary-btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    /* Efek hover pada tombol */
    .primary-btn:hover {
        background-color: #45a049;
    }

    /* Menambah margin-top pada tombol */
    .mt-20 {
        margin-top: 20px;
    }
</style>

            </form>
        </div>    
    </section>
    <div class="comment-section">
    <h2 class="comment-title">Komentar</h2>
    <div class="comment-box">
        <?php if (!empty($komen) && is_array($komen)) { ?>
            <?php foreach ($komen as $kom) { ?>
                <div class="comment-item">
                    <div class="comment-header">
                        <strong class="comment-username"><?= htmlspecialchars($kom['username']); ?></strong>
                        <span class="comment-date"><?= htmlspecialchars($kom['tanggal']); ?></span>
                    </div>
                    <p class="comment-text"><?= nl2br(htmlspecialchars($kom['isi_komen'])); ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="no-comments">Tidak ada komentar yang tersedia.</p>
        <?php } ?>
    </div>
</div>

    </div>
</body>
</html>
