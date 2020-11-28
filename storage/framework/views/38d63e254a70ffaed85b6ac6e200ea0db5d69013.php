@page  h<?php echo e($mainpagedetails[0]->ward); ?> {
        odd-header-name: html_ph<?php echo e($mainpagedetails[0]->ward); ?>;
        even-header-name: html_ph<?php echo e($mainpagedetails[0]->ward); ?>;
        odd-footer-name: html_pf<?php echo e($mainpagedetails[0]->ward); ?>;
        even-footer-name: html_pf<?php echo e($mainpagedetails[0]->ward); ?>;
    }

@page  ho<?php echo e($mainpagedetails[0]->ward); ?> {
        odd-header-name: html_pho<?php echo e($mainpagedetails[0]->ward); ?>;
        even-header-name: html_pho<?php echo e($mainpagedetails[0]->ward); ?>;
        odd-footer-name: html_pf<?php echo e($mainpagedetails[0]->ward); ?>;
        even-footer-name: html_pf<?php echo e($mainpagedetails[0]->ward); ?>;
    }

div.h<?php echo e($mainpagedetails[0]->ward); ?> {
        page-break-before: left;
        page: h<?php echo e($mainpagedetails[0]->ward); ?>;
        resetpagenum: 1;
    }

div.ho<?php echo e($mainpagedetails[0]->ward); ?> {
        page-break-before: right;
        page: ho<?php echo e($mainpagedetails[0]->ward); ?>;
    }   

@page  h<?php echo e($mainpagedetails[0]->ward); ?>:first {
	resetpagenum:1;
} 