<?php echo '<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
    <div class="card" >
        <img class="card-img-top"  style="height: 16rem;" src="'. ($receipe['image'] ?$receipe['image']: 'assets/images/none_image.jpg') .'" alt="'.$receipe['title'].'">
     
        <div class="card-img-overlay" style="right: auto;bottom: auto;    
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}">
            <a href="#" class="btn btn-light btn-sm">'.$receipe['category_name'].'</a>
              <div class="action">
         <a href="#" class="fas fa-edit text-info "></a> 
         <a href="#" class="fas fa-trash-alt text-danger ml-3"></a> 
</div>
           
        </div>
        <div class="card-body">
            <h4 class="card-title"> '.$receipe['title'].'</h4>

            <p class="card-text">'.$receipe['description'].'</p>
            <a href="#" class="btn btn-info">Читати</a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div class="views">'.$created_at->format('d.m.Y, H:i').'
            </div>
            <div class="stats">
                <i class="far fa-eye"></i> '.$receipe['views'].'
                <i class="far fa-comment"></i> '.$receipe['total_reviews'].'
            </div>

        </div>
    </div>

</div>';
