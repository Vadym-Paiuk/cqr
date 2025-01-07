<?php
function show_pagination( $foundPosts, $perPage = 1, $currentPage = 1, $current_page_url = '' ) {
	$html        = '';
	$arroundPage = 2;
	$foundPosts  = (int) $foundPosts;
	$perPage     = (int) $perPage;
	
	$prev_button = '<svg class="text-icon"
								     width="11"
								     height="12"
								     viewBox="0 0 11 12"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M10.166 6L0.832682 6M0.832682 6L5.49935 10.6667M0.832682 6L5.49935 1.33333"
									      stroke="currentColor"
									      stroke-width="1.33333"
									      stroke-linecap="round"
									      stroke-linejoin="round"></path>
								</svg>Prev';
	$next_button = 'Next <svg class="text-icon"
								     width="17"
								     height="16"
								     viewBox="0 0 17 16"
								     fill="none"
								     xmlns="http://www.w3.org/2000/svg">
									<path d="M3.83398 8H13.1673M13.1673 8L8.50065 3.33333M13.1673 8L8.50065 12.6667"
									      stroke="currentColor"
									      stroke-width="1.33333"
									      stroke-linecap="round"
									      stroke-linejoin="round"></path>
								</svg>';
	
	if ( $perPage >= $foundPosts ) {
		$html = '<input type="hidden" name="page" value="1">';
		$html .= '<input type="hidden" name="pagination" value="false">';
		
		echo $html;
		
		return;
	}
	
	$pages = (int) ceil( $foundPosts / $perPage );
	$page  = (int) $currentPage;
	$prev  = $page - 1;
	$next  = $page + 1;
	
	$html .= '<nav class="blog__pagination"
				     aria-label="..."><ul class="pagination">';
	
	if ( $page !== 1 ) {
		if ( $prev === 1 ) {
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . '" class="btn btn-primary btn-sm" data-page="' . $prev . '">' . $prev_button . '</a></li>';
		} else {
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $prev . '/" class="btn btn-primary btn-sm" data-page="' . $prev . '">' . $prev_button . '</a></li>';
		}
	}
	
	if ( ( $arroundPage * 2 + 1 ) >= $pages ) {
		
		for ( $i = 1; $i <= $pages; $i ++ ) {
			if ( $i === $page ) {
				$html .= '<li class="pagination-item active"><span class="pagination-link active">' . $i . '</span></li>';
			} else {
				if ( $i === 1 ) {
					$html .= '<li class="pagination-item"><a href="' . $current_page_url . '" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
				} else {
					$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $i . '/" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
				}
			}
		}
		
	} else {
		
		if ( $page <= ( $arroundPage + 2 ) ) {
			
			for ( $i = 1; $i <= ( $page + $arroundPage ); $i ++ ) {
				if ( $i === $page ) {
					$html .= '<li class="pagination-item active"><span class="pagination-link active">' . $i . '</span></li>';
				} else {
					if ( $i === 1 ) {
						$html .= '<li class="pagination-item"><a href="' . $current_page_url . '" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
					} else {
						$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $i . '/" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
					}
				}
			}
			
			$html .= '<li class="pagination-item"><span class="pagination-link pagination-link--dots">...</span></li>';
			
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $pages . '" class="pagination-link" data-page="' . $pages . '">' . $pages . '</a></li>';
		}
		
		if ( ( $arroundPage + 2 ) < $page && $page < ( $pages - ( $arroundPage + 1 ) ) ) {
			
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . '" class="pagination-link" data-page="1">1</a></li>';
			
			$html .= '<li class="pagination-item"><span class="pagination-link pagination-link--dots">...</span></li>';
			
			for ( $i = $page - $arroundPage; $i <= $page + $arroundPage; $i ++ ) {
				if ( $i === $page ) {
					$html .= '<li class="pagination-item active"><span class="pagination-link active">' . $i . '</span></li>';
				} else {
					$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $i . '/" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
				}
			}
			
			$html .= '<li class="pagination-item"><span class="pagination-link pagination-link--dots">...</span></li>';
			
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $pages . '/" class="pagination-link" data-page="' . $pages . '">' . $pages . '</a></li>';
			
		}
		
		if ( $page >= ( $pages - ( $arroundPage + 1 ) ) ) {
			
			$html .= '<li class="pagination-item"><a href="' . $current_page_url . '" class="pagination-link" data-page="1">1</a></li>';
			
			$html .= '<li class="pagination-item"><span class="pagination-link pagination-link--dots">...</span></li>';
			
			for ( $i = ( $page - $arroundPage ); $i <= $pages; $i ++ ) {
				if ( $i === $page ) {
					$html .= '<li class="pagination-item active"><span class="pagination-link active">' . $i . '</span></li>';
				} else {
					$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $i . '/" class="pagination-link" data-page="' . $i . '">' . $i . '</a></li>';
				}
			}
			
		}
		
	}
	
	if ( $page !== $pages && $perPage !== - 1 ) {
		$html .= '<li class="pagination-item"><a href="' . $current_page_url . 'page/' . $next . '/" class="btn btn-primary btn-sm" data-page="' . $next . '">' . $next_button . '</a></li>';
	}
	
	$html .= '</ul></nav>';
	
	echo $html;
}