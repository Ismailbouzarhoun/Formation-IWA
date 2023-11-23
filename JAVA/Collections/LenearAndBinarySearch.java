public class LenearAndBinarySearch {
    public static void main(String[] args) {
        int nums[]={4,5,7,11,17,20};
        int target=20;
        int result = binarySearch(nums,target);
        if(result!=-1)
            System.err.println("Element found at Index : "+result);
        else
            System.err.println("Element not found");
    }

    public static int lenearSearch(int[] nums, int target) {
        for(int i =0;i<nums.length;i++){
            if(nums[i]==target)
                return i;
        }
        return -1;
    }

    public static int binarySearch(int[] nums, int target) {
        int left=0;
        int right=nums.length-1;
        while(left<=right){
            int mid = (left+right)/2;
            if(nums[mid]==target){
                return mid;
            }
            else if(nums[mid]<target){
                left = mid + 1;
            }
            else{
                right = mid - 1;
            }
        }

        return -1;
    }

}
