<?php
class help_cate_model extends Model
{
    public $table_name = 'help_cate';
    
    public $rules = array
    (
        'cate_name' => array
        (
            'is_required' => array(TRUE, '分类名称不能为空'),
            'max_length' => array(60, '分类名称不能超过60个字符'),
        ),
        'seq' => array
        (
            'is_seq' => array(TRUE, '排序必须为0-99之间的整数数字'),
        ),
    );
    
    /**
     * 帮助分类列表(以主键作为数据列表索引)
     */
    public function indexed_list()
    {
        if($find_all = $this->find_all(null, 'seq ASC')) return vds_array_column($find_all, null, 'cate_id');
        return $find_all;
    }
}