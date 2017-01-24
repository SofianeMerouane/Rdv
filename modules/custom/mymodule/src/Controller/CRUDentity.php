<?php

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\mymodule\Tools\EntityCrud;
use Drupal\Core\Url;






/**
 * Class CRUDentity.
 *
 * @package Drupal\mymodule\Controller
 */
class CRUDentity extends ControllerBase {

    /**
     * Hello.
     *
     * @return string
     *   Return Hello string.
     */
    public function hello($name) {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
        ];
    }

    public function addCustomer($id) {




        return [
            '#type' => 'markup',
            '#markup' => $this->t('Implement method: hello with parameter(s):' . $id),
        ];
    }

    public function showCustomer() {

        /* return [
          '#type' => 'markup',
          '#markup' => $this->t('Implement method: hello with parameter(s):'.$id),
          ]; */

        $header = array(
            // We make it sortable by name.
            array('data' => $this->t('Name'), 'field' => 'name', 'sort' => 'asc'),
            array('data' => $this->t('DateBirth'), 'field' => 'dateBirth', 'sort' => 'asc'),
            array('data' => $this->t('Age'), 'field' => 'age', 'sort' => 'asc'),
            array('data' => $this->t('Delete')),
            array('data' => $this->t('Edite')),
        );

        $db = \Drupal::database();
        $query = $db->select('customer_field_data', 'c');
        $query->fields('c', array('id'));
        $query->fields('c', array('name'));
        $query->fields('c', array('dateBirth'));
        $query->fields('c', array('age'));
        // The actual action of sorting the rows is here.
        $table_sort = $query->extend('Drupal\Core\Database\Query\TableSortExtender')
                ->orderByHeader($header);
        // Limit the rows to 20 for each page.
        $pager = $table_sort->extend('Drupal\Core\Database\Query\PagerSelectExtender')
                ->limit(7);
        $result = $pager->execute();

        //create route path for delete customer
       //$route_name = ('mymodule.c_r_u_dentity_delete');
     // $link = \Drupal\Core\Link::createFromRoute($this->t('delete'), $route_name)->toString();
          
        // $link = \Drupal\Core\Link::fromTextAndUrl('delete', $url);
        // Populate the rows.
        $rows = array();
        foreach ($result as $row) {
            $rows[] = array('data' => array(
                    'name' => $row->name,
                    'dateBirth' => $row->dateBirth,
                    'age' => $row->age,
                    'Delete' => \Drupal\Core\Link::createFromRoute($this->t('Delete'), 'mymodule.c_r_u_dentity_delete', array('id'=>$row->id))->toString(),
            
                    'edite' => \Drupal\Core\Link::createFromRoute($this->t('Edite'), 'mymodule.c_r_u_dentity_edit', array('id'=>$row->id))->toString(),
                // This hardcoded is just for display purpose only.
            ));
        }

        // The table description.
        $build = array(
            '#markup' => t('List of All Configurations')
        );

        // Generate the table.
        $build['customer_table'] = array(
            '#theme' => 'table',
            '#header' => $header,
            '#rows' => $rows,
        );

        // Finally add the pager.
        $build['pager'] = array(
            '#type' => 'pager'
        );

        return $build;
    }

    public function editCustomer($id) {

        return [
            '#type' => 'markup',
            '#markup' => $this->t('Implement method: hello with parameter(s):' . $id),
        ];
    }

    public function deleteCustomer($id) {


       $db = \Drupal::database();
       $db->delete('customer_field_data')->condition('id',$id)->execute();
          
         // return new RedirectResponse(Url::fromUri('/mymodule/customer/show'));           
    }

}
