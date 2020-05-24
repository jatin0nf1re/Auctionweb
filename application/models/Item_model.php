<?php
class Item_model extends CI_Model{

    function getAllCategory(){
        $categoryList = array();
        $query = $this->db->get('category');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($categoryList, array($row->categID, $row->categName));
            }
            return $categoryList;
        }else{
            return 'No Category Exists';
        }
    }

    function createItem($item_data){
        $this->db->insert('Items', $item_data);
    }

    function getAllItems(){
        $itemList=array();
        $query =  $this->db->get('Items');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $item = array(
                    'itemID'=>$row->itemID,
                    'title'=>$row->Title,
                    'Description'=>$row->Description,
                    'ImagePath'=>$row->ImagePath,
                    'StartTime'=>$row->StartTime,
                    'EndTime'=>$row->EndTime,
                    'StartPrice'=>$row->StartPrice,
                    'SellerID'=>$row->SellerID,
                    'categID'=>$row->categID
                );
                array_push($itemList, $item);
            }
            return $itemList;
        }
    }

    function getItemBySeller($seller){
        $itemList=array();
        $this->db->where('sellerID', $seller);
        $query =  $this->db->get('Items');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                array_push($itemList, $row);
            }
            return $itemList;
        }
    }

    function getItemEndTime($itemID){
        $this->db->where('itemID', $itemID);
        $query =  $this->db->get('Items');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->EndTime;
            }
        }
    }

    function getBidsBySeller($id){
        $bidList = array();
        date_default_timezone_set("Asia/Calcutta");
        $this->db->where('memb_ID', $id);
        $query =  $this->db->get('Bids');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $endTime = $this->getItemEndTime($row->itemID);
                if(date("Y-m-d H:i:s")>$endTime && $row->status=='1'){
                    $result = 1;
                }else if(date("Y-m-d H:i:s")<$endTime && $row->status=='1'){
                    $result = 2;
                }else if(date("Y-m-d H:i:s")>$endTime && $row->status=='0'){
                    $result = 3;
                }else{
                    $result = 4;
                }
                $data = array(
                    'itemID'=>$row->itemID,
                    'price'=>$row->Price,
                    'result'=>$result
                );
                array_push($bidList, $data);
            }
            
        }
        return $bidList;
    }

    function getItem($id){
        $this->db->where('itemID', $id);
        $query = $this->db->get('Items');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row;
            }
        }else{
            show_404();
        }
    }

    function getPayStatus($itemID){
        $this->db->where('itemID', $itemID);
        $query = $this->db->get('Items');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->PayStatus;
            }
        }else{
            show_404();
        }
    }  

    function setPayStatus($itemID){
        $data = array(
            'PayStatus'=>1
        );
        $this->db->where('itemID', $itemID);
        $this->db->update('Items', $data);
    }


    function addreview($review){
        $this->db->insert('review', $review);
    }

    function getName($memb_ID){
        $this->db->where('memb_ID', $memb_ID);
        $query =  $this->db->get('members');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->f_name;
            }
        }else{
            return "Anonymous";
        }
    }

    function getreviews($itemID){
        $reviews = array();
        $this->db->where('itemID', $itemID);
        $query =  $this->db->get('review');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $rev = array(
                    'membName'=>$this->getName($row->memb_ID),
                    'rating'=>$row->rating,
                    'comment'=>$row->comment
                );
                array_push($reviews, $rev);
            }
            return $reviews;
        }else{
            return $reviews;
        }
    }

    function getCurrentBid($bidder, $itemID){
        $multipleWhere = ['memb_ID' => $bidder, 'itemID' => $itemID];
        $this->db->where($multipleWhere);
        $query =  $this->db->get('Bids');
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                return $row->Price;
            }
        }else{
            return '0';
        }
    }

    function updateCurrentBidder($itemID, $memb_ID){
        $data = array(
            'currentBidder'=>$memb_ID
        );
        $this->db->where('itemID', $itemID);
        $this->db->update('Items', $data);
    }

    function placeBid($bid, $currentBidder){
        $multipleWhere = ['memb_ID' => $bid['memb_ID'], 'itemID' => $bid['itemID']];
        $this->db->where($multipleWhere);
        $this->db->delete('Bids');

        $data = array(
            'status'=> 0
        );
        $multipleWhere = ['memb_ID' => $currentBidder, 'itemID' => $bid['itemID']];
        $this->db->where($multipleWhere);
        $this->db->update('Bids', $data);
        // $query =  $this->db->get('Bids');
        // if($query->num_rows()>0){
        //     foreach($query->result() as $row){
                
        //         $this->db->where($multipleWhere);
        //     }
        // }
        $this->db->insert('Bids', $bid);

        $this->updateCurrentBidder($bid['itemID'], $bid['memb_ID']);
    }
}
?>