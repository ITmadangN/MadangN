<?php

namespace user_include;

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

        $html = '<ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary mt-1" data-uc-margin="">';

        $this->first_page = (($this->block - 1) * $this->block_set) + 1;
        $this->last_page = min($this->total_page, $this->block * $this->block_set);

        $this->prev_page = $this->page - 1;
        $this->next_page = $this->page + 1;

        $this->prev_block = $this->block - 1;
        $this->next_block = $this->block + 1;

        $this->prev_block_page = $this->prev_block * $this->block_set;
        $this->next_block_page = $this->next_block * $this->block_set - ($this->block_set - 1);


        if ($this->prev_page > 0) {
            $html .= '<li class="uc-first-column">
                            <a href="javascript:GO_PAGE('.$this->prev_page.');"><span class="icon icon-1 unicon-chevron-left"></span></a>
                        </li>';

        } else {
            $html .= '<li class="uc-first-column">
                            <a href="javascript:return false;"><span class="icon icon-1 unicon-chevron-left"></span></a>
                        </li>';
        }

        for ($i = $this->first_page; $i <= $this->last_page; $i++) {

            if ($i == $this->page) {
                $html .= '<li><a href="javascript:return false;" class="uc-active">'.$i.'</a></li>';
            } else {
                $html .= '<li><a href="javascript:GO_PAGE('.$i.');">'.$i.'</a></li>';
            }
        }

        if ($this->next_page <= $this->total_page) {
            $html .= '<li>
                            <a href="javascript:GO_PAGE('.$this->next_page.');"><span class="icon icon-1 unicon-chevron-right"></span></a>
                        </li>';
        } else {
            $html .= '<li>
                            <a href="javascript:false;"><span class="icon icon-1 unicon-chevron-right"></span></a>
                        </li>';
        }

        $html .= '</ul>';

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