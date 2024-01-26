<?php
require_once('config.php');

class Dbc extends Database
{
    public function regLandUsers($user_id, $username, $fullname, $user_email, $user_role, $user_password, $accountstatus, $userType, $callNumber, $whatsappNumber)
    {
        $sql = "INSERT INTO real_users (user_id, username, fullname, user_email, user_role, user_password, accountstatus, userType, callNumber, whatsappNumber) VALUES ('$user_id', '$username', '$fullname', '$user_email', '$user_role', '$user_password', '$accountstatus', '$userType', '$callNumber', '$whatsappNumber')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }

    public function user_exitsEmail($user_email)
    {
        $sql = "SELECT * FROM real_users WHERE user_email='$user_email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function sendVerifyCode($fullname, $user_email, $verifycode, $status)
    {
        $sql = "INSERT INTO verifymail (fullname, user_email, verifycode, status) VALUES ('$fullname', '$user_email', '$verifycode', '$status')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function verifyCode($user_email, $verifycode)
    {
        $sql = "SELECT * FROM verifymail WHERE user_email='$user_email' AND status='not verify' AND verifycode='$verifycode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function Update($user_email, $verifycode)
    {
        $sql = "UPDATE verifymail SET status='verify' WHERE user_email='$user_email' AND verifycode='$verifycode'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }

    public function currentUser($user_email)
    {
        $sql = "SELECT * FROM real_users WHERE user_email=:user_email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_email' => $user_email
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function UpdateAgentProfile($fullname, $user_email, $usertitle, $userphone, $aboutuser, $user_id)
    {
        $sql = "UPDATE real_users SET fullname='$fullname', user_email='$user_email', usertitle='$usertitle', userphone='$userphone', aboutuser='$aboutuser' WHERE user_id='$user_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }
    public function UpdateData($table, $colume, $value, $user_id)
    {
        $sql = "UPDATE $table SET $colume='$value' WHERE user_id='$user_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }

    public function loginUsers($user_email)
    {
        $sql = "SELECT * FROM real_users WHERE user_email=:user_email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_email' => $user_email
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectFrom($user_id)
    {
        $sql = "SELECT * FROM real_users WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectFromImg($imageid)
    {
        $sql = "SELECT * FROM images WHERE imageid=:imageid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'imageid' => $imageid
        ]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function UploadProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimage, $status, $propertyCategory, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize, $titleproperty, $typeproperty)
    {
        $sql = "INSERT INTO properties (user_id, propertyid, propertytitle,  propertyprice, area_location,  address, city, state,  longtitude, langtitude, detailedinfo,  featuredimage, galleryimage, status, propertyCategory, bedrooms, bathroom, toilets, propsize, parkingspace, landsize, titleproperty, typeproperty) VALUES 
                   ('$user_id', '$propertyid', '$propertytitle',  '$propertyprice', '$area_location','$address', '$city',  '$state', '$longtitude', '$langtitude', '$detailedinfo',  '$featuredimage', '$galleryimage', '$status', '$propertyCategory', '$bedrooms', '$bathroom', '$toilets', '$propsize', '$parkingspace', '$landsize', '$titleproperty', '$typeproperty')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }
    public function EditProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimage, $status, $propertyCategory, $id, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize, $titleproperty, $typeproperty)
    {
        $sql = "UPDATE   `properties` SET  user_id = '$user_id', propertyid = '$propertyid', propertytitle = '$propertytitle',  propertyprice = '$propertyprice', area_location = '$area_location',  address = '$address', city = '$city', state = '$state',  longtitude = '$longtitude', langtitude = '$langtitude', detailedinfo = '$detailedinfo',  featuredimage = '$featuredimage', galleryimage = '$galleryimage', status = '$status', propertyCategory = '$propertyCategory' , bedrooms  = '$bedrooms', bathroom  = '$bathroom', toilets  = '$toilets', propsize  = '$propsize', parkingspace  = '$parkingspace', landsize = '$landsize', titleproperty = '$titleproperty', typeproperty = '$typeproperty'  WHERE id = '$id' ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }
    public function multiImage($imageid, $imagename)
    {
        $sql = "INSERT INTO `images` (`imageid`, `imagename`) VALUES ('$imageid','$imagename')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return true;
    }

    public function SelectAllAproperties($user_id, $propertyCategory)
    {
        $sql = "SELECT * FROM properties WHERE user_id='$user_id' AND propertyCategory='$propertyCategory' ORDER BY id DESC LIMIT 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoCat($user_id)
    {
        $sql = "SELECT * FROM properties WHERE user_id='$user_id'  ORDER BY id DESC LIMIT 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesSearch($search)
    {
        $sql = "SELECT * FROM properties WHERE propertytitle LIKE '%$search%' OR address LIKE '%$search%' OR city  LIKE '%$search%' OR state  LIKE '%$search%' ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllApropertiesNoSess()
    {
        $sql = "SELECT * FROM properties ORDER BY id DESC LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessLimit($propertyCategory)
    {
        $sql = "SELECT * FROM properties WHERE propertyCategory='$propertyCategory' ORDER BY id DESC  LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessNoLimit($propertyCategory)
    {
        $sql = "SELECT * FROM properties WHERE propertyCategory='$propertyCategory' ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex)
    {
        $sql = "SELECT * FROM properties WHERE propertyCategory='$propertyCategory'  ORDER BY id DESC  LIMIT $startIndex, $itemsPerPage   ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory)
    {
        $sql = "SELECT COUNT(*) as id FROM properties WHERE propertyCategory='$propertyCategory'";
        // $sql = "SELECT * FROM properties LIMIT $startIndex, $itemsPerPage WHERE propertyCategory='$propertyCategory' ORDER BY id DESC  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessNoLimitPagCountAll()
    {
        $sql = "SELECT COUNT(*) as id FROM properties ";
        // $sql = "SELECT * FROM properties LIMIT $startIndex, $itemsPerPage WHERE propertyCategory='$propertyCategory' ORDER BY id DESC  ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllApropertiesNoSessNoLimitNoCat($propertyCategory)
    {
        $sql = "SELECT * FROM properties WHERE propertyCategory='$propertyCategory' ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllApropertiesNoSessWhere($propertyCategory, $id)
    {
        $sql = "SELECT * FROM properties WHERE propertyCategory='$propertyCategory' AND id='$id'  ORDER BY id DESC LIMIT 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllApropertiesNoSessWhereNoCat($id)
    {
        $sql = "SELECT * FROM properties WHERE  id='$id'  ORDER BY id DESC LIMIT 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllproperties()
    {
        $sql = "SELECT * FROM properties  ORDER BY id DESC LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function SelectAllpropertiesNoLimit($startIndex, $itemsPerPage)
    {
        $sql = "SELECT * FROM properties  ORDER BY id DESC  LIMIT $startIndex, $itemsPerPage   ";
        // $sql = "SELECT * FROM properties  ORDER BY id DESC ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllApropertiesWhere($user_id, $propertyCategory, $area_location, $city, $state)
    {
        $sql = "SELECT * FROM properties WHERE user_id='$user_id' AND (propertyCategory='$propertyCategory' AND area_location='$area_location' AND city='$city' AND state='$state') OR (propertyCategory='$propertyCategory' OR area_location='$area_location' OR city='$city' OR state='$state') OR (propertyCategory='$propertyCategory' AND area_location='$area_location' OR city='$city' OR state='$state') OR (propertyCategory='$propertyCategory' AND area_location='$area_location' OR city='$city' OR state='$state') OR (propertyCategory='$propertyCategory' OR area_location='$area_location' AND city='$city' OR state='$state')  OR (propertyCategory='$propertyCategory' OR area_location='$area_location' OR city='$city' AND state='$state') ORDER BY id DESC LIMIT 10";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function SelectAllApropertiesWhereNoSess($propertyCategory, $state)
    {
        $sql = "SELECT * FROM properties WHERE  propertyCategory='$propertyCategory'  AND state='$state'  ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }




}