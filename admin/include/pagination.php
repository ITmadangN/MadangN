<?php

namespace include;

use Migliori\PowerLitePdo\Db;

class Pagination
{

    private int $page = 1;
    private int $total = 0;
    private int $block = 0;

    public int $page_set = 10;
    private int $block_set = 10;

    private int $total_page = 0;
    private int $total_block = 0;

    public int $limit_regno = 0;

    private int $first_page = 0;
    private int $last_page = 0;

    private int $prev_page = 0;
    private int $next_page = 0;

    private int $prev_block = 0;
    private int $next_block = 0;

    private int $prev_block_page = 0;
    private int $next_block_page = 0;

    public int $no = 0;
    private Db $db;

    private string $countQuery;

    private string $params = '';

    public string $navigation_text = "";


    public function __construct(Db $db, string $countQuery, string $params= '', int $page = 1, int $page_set = 10, int $block_set = 10)
    {
        $this->db = $db;
        $this->countQuery = $countQuery;
        $this->page = $page;
        $this->page_set = $page_set;
        $this->block_set = $block_set;
        $this->params = $params;

        $this->init();
    }

    public function Print_Paging()
    {

        $html = '<div class="dataTables_paginate paging_simple_numbers" id="datatable-ecommerce-list_paginate">
                        <ul class="pagination pagination-modern pagination-modern-spacing justify-content-center">';

        $this->first_page = (($this->block - 1) * $this->block_set) + 1;
        $this->last_page = min($this->total_page, $this->block * $this->block_set);

        $this->prev_page = $this->page - 1;
        $this->next_page = $this->page + 1;

        $this->prev_block = $this->block - 1;
        $this->next_block = $this->block + 1;

        $this->prev_block_page = $this->prev_block * $this->block_set;
        $this->next_block_page = $this->next_block * $this->block_set - ($this->block_set - 1);


        if ($this->prev_page > 0) {
            $html .= '<li class="paginate_button page-item previous" id="datatable-ecommerce-list_previous">
                        <a aria-controls="datatable-ecommerce-list" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link" href="javascript:GO_PAGE('.$this->prev_page.');">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                      </li>';
        } else {
            $html .= '<li class="paginate_button page-item previous disabled" id="datatable-ecommerce-list_previous"><a aria-controls="datatable-ecommerce-list" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="fas fa-chevron-left"></i></a></li>';
        }

        for ($i = $this->first_page; $i <= $this->last_page; $i++) {

            if ($i == $this->page) {
                $html .= '<li class="paginate_button page-item active"><a href="javascript:return false;" aria-controls="datatable-ecommerce-list" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">'.$i.'</a></li>';
            } else {
                $html .= '<li class="paginate_button page-item "><a href="javascript:GO_PAGE('.$i.');" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
            }
        }

        if ($this->next_page <= $this->total_page) {
            $html .= '<li class="paginate_button page-item next" id="datatable-ecommerce-list_next"><a href="javascript:GO_PAGE('.$this->next_page.');" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="fas fa-chevron-right"></i></a></li>';
        } else {
            $html .= '<li class="paginate_button page-item next disabled" id="datatable-ecommerce-list_next"><a href="javascript:return false;" aria-controls="datatable-ecommerce-list" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="fas fa-chevron-right"></i></a></li>';
        }

        $html .= '</ul>
            </div>';

        return $html;

    }


    function init()
    {
        $this->total = $this->db->queryValue($this->countQuery);
        $this->total_page = (int)ceil($this->total / $this->page_set);
        $this->total_block = (int)ceil($this->total_page / $this->block_set);

        $this->block = (int)ceil($this->page / $this->block_set);

        $this->limit_regno = ($this->page - 1) * $this->page_set;

        $this->no = $this->total - $this->limit_regno;

    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getTotalPage(): int
    {
        return $this->total_page;
    }

}